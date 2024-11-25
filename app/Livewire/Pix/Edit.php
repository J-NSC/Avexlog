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

class Edit extends Component
{
    use WithPagination;
    public $id;
    public Pix $pix;
    #[Validate("required", as:"Pix")]
    public $pix_key ;

    #[On("send_pix_edit")]
    public function mount(Pix $pix){
        $this->pix = $pix;

        $this->pix_key = $pix->pix_key;
    }
    public function save()
    {
        $this->validate();

        DB::beginTransaction();
        try {

            $this->pix->update([
                'pix_key' => $this->pix_key,
            ]);

            DB::commit();
            session()->flash('alert-success', 'pix atualizado com sucesso!');
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
        return view('livewire.pix.edit', [
        ]);
    }
}


