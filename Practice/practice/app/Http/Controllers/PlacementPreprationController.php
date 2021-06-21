<?php

namespace App\Http\Controllers;

use App\PlacementPrepration;
use Illuminate\Http\Request;

class PlacementPreprationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ques=PlacementPrepration::all();
        return view('Practice.index')->withQues($ques);
    }

    public function loadData($start,$last)
    {
        return view('Practice.fetch_all_data');

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PlacementPrepration  $placementPrepration
     * @return \Illuminate\Http\Response
     */
    public function show(PlacementPrepration $placementPrepration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PlacementPrepration  $placementPrepration
     * @return \Illuminate\Http\Response
     */
    public function edit(PlacementPrepration $placementPrepration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PlacementPrepration  $placementPrepration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlacementPrepration $placementPrepration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PlacementPrepration  $placementPrepration
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlacementPrepration $placementPrepration)
    {
        //
    }
}
