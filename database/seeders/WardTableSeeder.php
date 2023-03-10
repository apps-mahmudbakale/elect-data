<?php

namespace Database\Seeders;

use App\Models\Lga;
use App\Models\State;
use App\Models\Ward;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = State::where('name', '=', 'SOKOTO')->first();
        $lgas = Lga::all();

        foreach ($lgas as $lga) {
            $client = new Client();
            $options = [
                'verify' => false,
                'multipart' => [
                    [
                        'name' => 'lga_id',
                        'contents' => $lga->id
                    ],
                    [
                        'name' => 'state_id',
                        'contents' => $state->id
                    ]
                ]
            ];
            $request = new Request('POST', 'https://main.inecnigeria.org/wp-content/themes/independent-national-electoral-commission/custom/views/wardView.php');
            $res = $client->sendAsync($request, $options)->wait();
            $wards = json_decode($res->getBody(), true);

            foreach ($wards as $ward) {
                Ward::create([
                    'id'=> $ward['id'],
                    'lga_id' => $lga->id,
                    'name' => $ward['name']
                ]);
            }
        }
    }
}
