<?php

namespace App\Livewire\User;

use App\Models\Advance\AdvanceRequest;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public function render()
    {


        return view('livewire.user.table', [
            'users' =>User::query()->paginate(10)
        ]);
    }
}
