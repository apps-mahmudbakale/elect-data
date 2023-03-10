<?php

namespace Database\Seeders;

use App\Models\Party;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parties = [
            'ADP',
            'APC',
            'NNPP',
            'LP',
            'PDP'
        ];


        foreach($parties as $party){
            Party::create([
                'name' =>$party
            ]);
        }
    }
}
