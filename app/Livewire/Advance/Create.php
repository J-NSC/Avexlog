<?php

namespace App\Livewire\Advance;

use App\Models\Advance\AdvanceRequest;
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
    #[Validate('required', as: 'Serviço')]
    public $agreement = false;
    #[Validate('required', as: 'Valor')]
    public $amount;

    public function save(){
        $this->validate();

        if (!$this->agreement) {
            session()->flash('alert-danger', 'Você deve aceitar os termos de serviço.');
            return;
        }

        DB::beginTransaction();
        try {
            $termService = TermService::firstOrCreate(['agreed' => $this->agreement]);
            AdvanceRequest::create([
                'driver_id' => Auth::id(),
                'term_service_id' => $termService->id,
                'request_date' => now(),
                'reference_date' => now()->addDays(7),
                'rate' => 5.00,
                'advance_amount' => $this->amount,
            ]);
            DB::commit();
            session()->flash('alert-success' , 'Adiantamento solicitado com sucesso!');
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
        return view('livewire.advance.create', [
            'user' => Auth::user()
        ]);
    }
}


