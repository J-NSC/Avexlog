<?php

namespace App\Livewire\Scheduler;

use App\Enum\SchedulerStatus;
use App\Models\Advance\AdvanceRequest;
use App\Models\Scheduler;
use App\Models\TermService;
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
    public $justification = '';
    public function save(){
        $this->validate();

        DB::beginTransaction();
        try {

             $scheduler = Scheduler::create([
               'date' => $this->date,
               'status' => SchedulerStatus::SENDED,
               'justification' => $this->justification,
            ]);

             $scheduler->user()->attach(Auth::id());
            DB::commit();
            session()->flash('alert-success' , 'Escala enviada com sucesso!');
            return redirect(request()->headers->get('referer'));
        }catch (Throwable $t){
            report($t);
            DB::rollBack();
            session()->flash('alert-danger', $t->getMessage());
            return redirect(request()->headers->get('referer'));
        }
    }

    public function render()
    {
        return view('livewire.scheduler.create', [
            'user' => Auth::user()
        ]);
    }
}


