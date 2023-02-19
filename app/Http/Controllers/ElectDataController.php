<?php

namespace App\Http\Controllers;

use App\Models\ElectData;
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
        //
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
    public function show(ElectData $electData)
    {
        //
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
    public function destroy(ElectData $electData)
    {
        //
    }
}
