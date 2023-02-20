<?php

namespace App\Http\Controllers;

use App\Models\ElectData;
use App\Models\Party;
use Illuminate\Http\Request;

class ElectDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ElectData  $electData
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ElectData::where('elect_data.id', $id)->join('users', 'users.id', '=', 'elect_data.user_id')->first();
        // dd($data);
        $parties = Party::all();
        return view('datas.show', compact('data', 'parties'));
    }


    public function search(Request $request)
    {
        $data = ElectData::where('elect_data.unit_id', $request->unit_id)->join('users', 'users.id', '=', 'elect_data.user_id')->first();
        // dd($request->all());
        $parties = Party::all();
        return view('datas.show', compact('data', 'parties'));
    }

    public function viewResult()
    {
        return view('datas.view');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ElectData  $electData
     * @return \Illuminate\Http\Response
     */
    public function edit(ElectData $electData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ElectData  $electData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ElectData $electData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ElectData  $electData
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ElectData::find($id);
        $data->delete();
        return redirect()->route('datas.index')->with('success', 'Data Deleted');
    }
}
