<?php

namespace App\Livewire\Advance;

use App\Models\Advance\AdvanceRequest;
use App\Models\Pix;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.advance.table', [
            'advances' => AdvanceRequest::query()->paginate(10)
        ]);
    }
}
