<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Professional;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Tenant;

class AppointmentController extends Controller
{
    // API/Página para listar profissionais e serviços (Vitrine)
    public function index()
    {
        $currentTenant = app(Tenant::class);

        $services = Service::all();
        $professionals = Professional::all();
        return view('booking.index', compact('services', 'professionals', 'currentTenant'));
    }

    // Processar o agendamento do cliente
    public function store(Request $request, $tenant_slug = null)
    {
        if (!$tenant_slug) {
            $referer = $request->headers->get('referer'); 
            $segments = explode('/', parse_url($referer, PHP_URL_PATH));
            // Captura o valor que vem após o '/b/' (geralmente o índice 2 do array)
            $tenant_slug = $segments[2] ?? null; 
        }
        //$tenant = app(Tenant::class);
        $tenant = Tenant::where('slug', $tenant_slug)->first();

        if (!$tenant) {
            return redirect()->back()->with('error', 'Não foi possível identificar a barbearia deste agendamento.');
        }

        app()->instance(Tenant::class, $tenant);


        $request->validate([
            'professional_id' => 'required|exists:professionals,id',
            'service_id' => 'required|exists:services,id',
            'start_time' => 'required|date|after:now',
        ]);

        

        $service = Service::find($request->service_id);
        $startTime = Carbon::parse($request->start_time);
        
        // Calcula o horário de término baseado na duração do serviço
        $endTime = $startTime->copy()->addMinutes($service->duration_minutes);

        // Validação crucial: Evitar choque de horários na agenda do barbeiro
        $conflict = Appointment::where('professional_id', $request->professional_id)
            ->where(function($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                      ->orWhereBetween('end_time', [$startTime, $endTime]);
            })->exists();

        if ($conflict) {
            return redirect()->back()->with('error', 'Este horário já está ocupado por outro cliente!');
        }

        Appointment::create([
            'tenant_id'       => $tenant->id,
            'user_id' => auth()->id() ?? 1, // Exemplo usando usuário logado ou um padrão
            'professional_id' => $request->professional_id,
            'service_id' => $request->service_id,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'status' => 'confirmed'
        ]);

        //return redirect()->route('booking.index')->with('success', 'Agendamento realizado com sucesso!');
        return redirect()->route('booking.index', ['tenant_slug' => $tenant_slug])
            ->with('success', 'Agendamento realizado com sucesso!');
    
    }

    /**
     * Exibe a página de cadastro do painel administrativo
     */
    public function adminPage()
    {
        return view('booking.admin');
    }

    /**
     * Salva um novo serviço no banco
     */
    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_minutes' => 'required|integer|min:1',
        ]);

        Service::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'duration_minutes' => $request->duration_minutes,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('booking.index')->with('success', 'Serviço cadastrado com sucesso na vitrine!');
    }

    /**
     * Salva um novo profissional no banco
     */
    public function storeProfessional(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
        ]);

        Professional::create([
            'name' => $request->name,
            'specialty' => $request->specialty,
            'commission_rate' => 50.00, // Padrão inicial
            'working_hours' => ['segunda' => '09:00-18:00', 'terca' => '09:00-18:00'], // Horário padrão fictício
        ]);

        return redirect()->route('booking.index')->with('success', 'Profissional cadastrado com sucesso!');
    }

    public function dashboard($tenant_slug)
    {
        // 1. Puxa todos os agendamentos da barbearia logada/acessada
        // Usamos o eager loading (with) para carregar os nomes do serviço, profissional e cliente sem pesar o banco
        $appointments = Appointment::with(['service', 'professional', 'user'])
                            ->orderBy('start_time', 'asc')
                            ->get();

        // 2. Calcula as métricas para os blocos do Dashboard
        $totalAgendamentos = $appointments->count();
        
        // Soma o preço de todos os serviços agendados
        $faturamentoTotal = $appointments->sum(function($appointment) {
            return $appointment->service->price ?? 0;
        });

        // Calcula o ticket médio (Faturamento / Total)
        $ticketMedio = $totalAgendamentos > 0 ? ($faturamentoTotal / $totalAgendamentos) : 0;

        // 3. Retorna a view passando as variáveis
        return view('booking.dashboard', compact(
            'appointments', 
            'totalAgendamentos', 
            'faturamentoTotal', 
            'ticketMedio'
        ));
    }

    public function trail($tenant_slug)
    {
        // O middleware 'tenant' já injetou a barbearia ativa no container global
        $tenant = app(Tenant::class);

        // Captura apenas os serviços e profissionais da barbearia atual
        $services = Service::where('tenant_id', $tenant->id)->get();
        $professionals = Professional::where('tenant_id', $tenant->id)->get();

        return view('booking.trail', compact('services', 'professionals'));
    }


}