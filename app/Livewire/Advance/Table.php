<?php

namespace App\Livewire\Advance;

use App\Models\Advance\AdvanceRequest;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public function render()
    {

        return view('livewire.advance.table', [
            'advances' => AdvanceRequest::with('driver.user')->paginate(10)
        ]);
    }
}
