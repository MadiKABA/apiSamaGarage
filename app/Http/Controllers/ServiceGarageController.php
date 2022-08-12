<?php

namespace App\Http\Controllers;

use App\Models\ServiceGarage;
use Illuminate\Http\Request;

class ServiceGarageController extends Controller
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
        foreach ($request->all() as $key){
            $serviceGarage=new ServiceGarage();
            $serviceGarage->garage_id=$key['garage_id'];
            $serviceGarage->service_id=$key['service_id'];
            //dd($serviceGarage->service_id);
            $serviceGarage->save();
        }
        return response()->json($serviceGarage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service_Garage  $service_Garage
     * @return \Illuminate\Http\Response
     */
    public function show(Service_Garage $service_Garage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service_Garage  $service_Garage
     * @return \Illuminate\Http\Response
     */
    public function edit(Service_Garage $service_Garage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service_Garage  $serviceGarage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service_Garage $serviceGarage)
    {
        foreach ($request->all() as $key){
            $serviceGarage->garage_id=$key['garage_id'];
            $serviceGarage->service_id=$key['service_id'];
            //dd($serviceGarage->service_id);
            $serviceGarage->save();
        }
        return response()->json($serviceGarage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service_Garage  $service_Garage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service_Garage $service_Garage)
    {
        //
    }
}
