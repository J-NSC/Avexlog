<?php

namespace App\Livewire\Pix;

use App\Enum\SchedulerRoster;
use App\Enum\SchedulerStatus;
use App\Models\Advance\AdvanceRequest;
use App\Models\Pix;
use App\Models\Scheduler;
use App\Models\TermService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Throwable;

class Destroy extends Component
{
    public $id;

    public Pix $pix ;

    #[On("send_pix_destroy")]
    public function mount(PIX $pix)
    {
        $this->pix = $pix;
    }
    public function destroy()
    {
        $this->pix->delete();
        session()->flash('message', 'Pix deletado com sucesso.');
        return redirect(request()->headers->get('referer'));
    }

    public function render()
    {
        return view('livewire.pix.destroy', [
            "pix" => $this->pix
        ]);
    }
}


