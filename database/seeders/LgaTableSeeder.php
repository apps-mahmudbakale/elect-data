<?php

namespace Database\Seeders;

use App\Models\Lga;
use App\Models\State;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LgaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = State::where('name', '=', 'SOKOTO')->first();

        $client = new Client();
        $options = [
            'verify' => false,
            'multipart' => [
                [
                    'name' => 'state_id',
                    'contents' => $state->id
                ]
            ]
        ];
        $request = new Request('POST', 'https://main.inecnigeria.org/wp-content/themes/independent-national-electoral-commission/custom/views/lgaView.php');
        $res = $client->sendAsync($request, $options)->wait();
        $lgas = json_decode($res->getBody(), true);
        
        foreach ($lgas as $lga) {
            Lga::create([
                'id'=> $lga['id'],
                'state_id' => $state->id,
                'name' => $lga['name']
            ]);
        }
        
    }
}
