<?php

use App\Models\Lga;
use App\Models\State;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\ElectDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('test', function () {
    $state = State::where('name', '=', 'SOKOTO')->first();
    // echo $state->id;
    $lgas = Lga::all();

        foreach ($lgas as $lga) {
            // echo $lga->id;
            
            $client = new Client();
            $options = [
                'verify' => false,
                'multipart' => [
                    [
                        'name' => 'lga_id',
                        'contents' => $lga['id']
                    ],
                    [
                        'name' => 'state_id',
                        'contents' => $state['id']
                    ]
                ]
            ];
            $request = new Request('POST', 'https://main.inecnigeria.org/wp-content/themes/independent-national-electoral-commission/custom/views/wardView.php');
            $res = $client->sendAsync($request, $options)->wait();
            echo $res->getBody();
            exit();
        }
    
});

Route::get('/curl', function () {
    $client = new Client();
    $options = [
        'verify' => false,
        'multipart' => [
            [
                'name' => 'state_id',
                'contents' => '33'
            ]
        ]
    ];
    $request = new Request('POST', 'https://main.inecnigeria.org/wp-content/themes/independent-national-electoral-commission/custom/views/lgaView.php');
    $res = $client->sendAsync($request, $options)->wait();
    $data = json_decode($res->getBody(), true);
    return $data[0];
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::resource('parties', PartyController::class);
Route::resource('datas', ElectDataController::class);
Route::get('view-result', [ElectDataController::class, 'viewResult'])->name('datas.view');
Route::post('view-result', [ElectDataController::class, 'search'])->name('datas.search');
