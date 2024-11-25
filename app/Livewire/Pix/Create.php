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
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Throwable;

class Create extends Component
{
    use WithPagination;
    public $id;
    #[Validate("required", as:"Pix")]
    public $pix = '';
    public function save()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            Pix::create([
                'pix_key' => $this->pix,
                'user_id' => Auth::id(),
            ]);

            DB::commit();
            session()->flash('alert-success', 'pix cadastrado com sucesso!');
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
        return view('livewire.pix.create', [

        ]);
    }
}


