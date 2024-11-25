<?php

namespace App\Livewire\Delivery;

use App\Enum\SchedulerStatus;
use App\Livewire\Pix\Destroy;
use App\Livewire\Pix\Edit;
use App\Models\Advance\AdvanceRequest;
use App\Models\Pix;
use App\Models\Scheduler;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $inputValue = 0;

    public function sendDestroyId($id)
    {
        $pix = Pix::query()->find($id);
        $this->dispatch('send_pix_destroy', ['pix' => $pix])->to(Destroy::class);
    }

    public function sendEditId($id){
        $pix = Pix::query()->find($id);
        $this->dispatch('send_pix_edit', ['pix' => $pix])->to(Edit::class);
    }


    public function increment()
    {
        $this->value++;
    }

    public function render()
    {
        return view('livewire.delivery.table', [
            'pixes' => Pix::query()->paginate(10)
        ]);
    }
}
