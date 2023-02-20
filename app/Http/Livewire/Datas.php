<?php

namespace App\Http\Livewire;

use App\Models\ElectData;
use Livewire\Component;

class Datas extends Base
{
    public $sortBy = 'user_id';
    public function render()
    {
        if ($this->search) {
            $datas = ElectData::join('users', 'users.id', '=', 'elect_data.user_id')
                ->where('user_id', 'like', '%' . $this->search . '%')
                ->select('elect_data.*', 'users.state_name', 'users.lg_name', 'users.ward_name', 'users.unit_name')
                ->paginate(10);

            return view(
                'livewire.datas',
                ['datas' => $datas]
            );
        } else {
            $datas = ElectData::join('users', 'users.id', '=', 'elect_data.user_id')
            ->select('elect_data.*', 'users.state_name', 'users.lg_name', 'users.ward_name', 'users.unit_name')
            ->distinct()
                ->paginate($this->perPage);
            return view(
                'livewire.datas',
                ['datas' => $datas]
            );
        }
    }
}
