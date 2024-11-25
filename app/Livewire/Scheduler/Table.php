<?php

namespace App\Livewire\Scheduler;

use App\Enum\SchedulerStatus;
use App\Models\Advance\AdvanceRequest;
use App\Models\Scheduler;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    #[Url(history: false)]
    public $date;

    #[Url(except: '')]
    public $turn ;

    public function mount()
    {
        if (!request()->has('date'))
            $this->date = now()->format('Y-m-d');
    }

    public function updateSchedulerStatus($id, $status)
    {
        try {
            $scheduler = Scheduler::find($id);

            if (!$scheduler) {
                session()->flash('alert-danger', 'Escala não encontrada.');
                return redirect(request()->headers->get('referer'));
            }

            if (auth()->user()->hasRole('delivery_driver') && $status === SchedulerStatus::CANCELLED->value) {
                $turnTimeRange = \getTurnTimeRange($scheduler->turn->value, $scheduler->date);
                $currentTime = Carbon::now();

                $hoursUntilTurnStart = $currentTime->diffInHours($turnTimeRange['start'], false);
                if ($hoursUntilTurnStart < 3) {
                    session()->flash('alert-danger', 'Você só pode cancelar a escala até 3 horas antes do início do turno.');
                    return redirect(request()->headers->get('referer'));
                }
            }


            $scheduler->update([
                'status' => $status
            ]);

            $message = match ($status) {
                SchedulerStatus::ACCEPTED => 'Escala aceita com sucesso.',
                SchedulerStatus::REJECTED => 'Escala rejeitada.',
                SchedulerStatus::CANCELLED => 'Escala cancelada com sucesso.',
                default => 'Status atualizado.',
            };

            session()->flash('alert-success', $message);

            return redirect(request()->headers->get('referer'));
        } catch (\Throwable $th) {
            report($th);
            session()->flash('alert-danger', $th->getMessage());
            DB::rollBack();
            return redirect(request()->headers->get('referer'));
        }
    }


    public function render()
    {
        return view('livewire.scheduler.table', [
            'schedules' => Scheduler::query()
                ->whereDate('date', $this->date)
                ->when($this->turn , fn($q) => $q->where('turn' , $this->turn))
                ->paginate(10),
        ]);
    }
}
