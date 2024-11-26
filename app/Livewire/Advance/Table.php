<?php

namespace App\Livewire\Advance;

use App\Models\Advance\AdvanceRequest;
use App\Models\Pix;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        $user = Auth::user();

        $advances = AdvanceRequest::query();

        if ($user && $user->hasRole('delivery_driver')) {
            $advances->where('user_id', $user->id);
        }

        return view('livewire.advance.table', [
            'advances' => $advances->paginate(10),
        ]);
    }
}
