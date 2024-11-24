<?php

namespace App\Livewire\Scheduler;

use App\Enum\SchedulerRoster;
use App\Enum\SchedulerStatus;
use App\Models\Advance\AdvanceRequest;
use App\Models\Scheduler;
use App\Models\TermService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Throwable;

class Create extends Component
{
    use WithPagination;
    public $id;


    #[Validate("required|date", as: 'Dia')]
    public $date;
    #[Validate("required", as: 'Turno')]
    public $turn;
    public $justification = '';
    public function save()
    {
        $this->validate();

        $startOfWeek = Carbon::now()->startOfWeek();
        $startDate = Carbon::now()->greaterThan($startOfWeek) ? Carbon::now() : $startOfWeek;
        $endOfNextWeek = Carbon::now()->endOfWeek()->addWeek();

        $selectedDate = Carbon::parse($this->date);
        if ($selectedDate->between($startDate, $endOfNextWeek)) {
            session()->flash('alert-danger', 'A data deve estar entre hoje e o fim da próxima semana.');
            return redirect(request()->headers->get('referer'));
        }

        if ($selectedDate->isToday()) {
            $currentTime = Carbon::now();
            $turnTimeRange = \getTurnTimeRange($this->turn, $this->date);

            $hoursUntilTurnStart = $currentTime->diffInHours($turnTimeRange['start'], false);

            if ($hoursUntilTurnStart < 3) {
                session()->flash('alert-danger', 'Você só pode solicitar uma escala até 3 horas antes do início do turno.');
                return redirect(request()->headers->get('referer'));
            }
        }

        DB::beginTransaction();
        try {
            $scheduler = Scheduler::create([
                'date' => $this->date,
                'status' => SchedulerStatus::SENDED,
                'turn' => $this->turn,
                'justification' => $this->justification,
            ]);

            $scheduler->user()->attach(Auth::id());
            DB::commit();

            session()->flash('alert-success', 'Escala enviada com sucesso!');
            return redirect(request()->headers->get('referer'));
        } catch (Throwable $t) {
            report($t);
            DB::rollBack();
            session()->flash('alert-danger', $t->getMessage());
            return redirect(request()->headers->get('referer'));
        }
    }

    public function render()
    {
        return view('livewire.scheduler.create', [
            'user' => Auth::user(),
            'startOfWeek' => Carbon::now()->greaterThan(Carbon::now()->startOfWeek()) ? Carbon::now()->toDateString() : Carbon::now()->startOfWeek()->toDateString(),
            'endOfNextWeek' => Carbon::now()->endOfWeek()->addWeek()->toDateString(),
        ]);
    }
}


