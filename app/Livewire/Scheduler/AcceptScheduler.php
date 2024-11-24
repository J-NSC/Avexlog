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

class AcceptScheduler extends Component
{
    use WithPagination;
    public $id;

    #[Validate("required|date", as: 'Dia')]
    public $date;
    public $justification = '';
    public function save(){
        $this->validate();
    }

    public function render()
    {
        return view('livewire.scheduler.accept-scheduler', [
            'user' => Auth::user()
        ]);
    }
}


