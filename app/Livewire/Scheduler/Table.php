<?php

namespace App\Livewire\Scheduler;

use App\Models\Advance\AdvanceRequest;
use App\Models\Scheduler;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public function render()
    {

        return view('livewire.scheduler.table', [
            'schedules' => Scheduler::query()->paginate(10)
        ]);
    }
}
