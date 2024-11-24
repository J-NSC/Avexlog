<?php

namespace App\Livewire\Advance;

use App\Models\Advance\AdvanceRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SerivceTerm extends Component
{
    use WithPagination;

    public function render()
    {

        return view('livewire.advance.service_term', [
            'user' => Auth::user()
        ]);
    }
}
