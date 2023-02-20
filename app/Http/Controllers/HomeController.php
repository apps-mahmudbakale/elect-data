<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Livewire\Users;
use App\Models\ElectData;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $votes = ElectData::sum('valid_votes');
        $datas = Party::all();
        $parties = Party::count();
        return view('home', compact('users', 'votes', 'datas', 'parties'));
    }
}
