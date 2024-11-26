<?php

namespace App\Livewire\Delivery;

use App\Models\Advance\AdvanceRequest;
use App\Models\User;
use App\Models\Work;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $delivery;
    public $inputValue = 0;
    public $today;

    public $deliveryValue = 0;

    public function mount()
    {
        $this->today = Carbon::today();
    }

    public function updatedDeveryValue()
    {
        Work::updated([
            'delivery_value' => $this->deliveryValue,
        ]);
    }

    public function render()
    {
        return view('livewire.delivery.table', [
            'deliveries' => User::role('delivery_driver')
            ->whereHas('AdvanceRequests', function ($query) {
                $query->whereDate('request_date', $this->today);
            })->paginate(10)
        ]);
    }
}
