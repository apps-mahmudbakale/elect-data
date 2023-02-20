<?php

namespace App\Http\Livewire;

use App\Models\Party;
use Livewire\Component;

class Parties extends Base
{
    public $sortBy = 'name';
    public function render()
    {
        if ($this->search) {
            $parties = Party::query()
                ->where('name', 'like', '%' . $this->search . '%')
                ->paginate(10);

            return view(
                'livewire.parties',
                ['parties' => $parties]
            );
        } else {
            $parties = Party::query()->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage);
            return view(
                'livewire.parties',
                ['parties' => $parties]
            );
        }
    }
}
