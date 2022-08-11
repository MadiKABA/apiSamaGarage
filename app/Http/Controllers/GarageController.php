<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use Illuminate\Http\Request;
class GarageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $garages=Garage::all();
        return response()->json($garages);
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
        //dd($request["description"]);
        $garage=new Garage();
        $completeFileNmae=$request->file('image')->getClientOriginalName();
        $fileNmaeOnLy=pathinfo($completeFileNmae,PATHINFO_FILENAME);
        $extension=$request->file('image')->getClientOriginalExtension();
        $compPic=str_replace(' ','_',$fileNmaeOnLy).'-'.rand().'_'.time().'.'.$extension;
        $path=$request->file('image')->storeAs('public/garage',$compPic);
        $garage->nom=$request["nom"];
        $garage->description=$request["description"];
        $garage->longitude=$request["longitude"];
        $garage->latitude=$request["latitude"];
        $garage->heureOurverture=$request["heureOurverture"];
        $garage->heureFermeture=$request["heureFermeture"];
        $garage->adresse=$request["adresse"];
        $garage->image=$compPic;
        $garage->zone_id=$request["zone_id"];
        $garage->save();
        return response()->json($garage);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function show(Garage $garage)
    {
        $garage=Garage::find($garage);
        return response()->json([
            "success"=>true,
            "message"=>"update successfully",
            "data"=>$garage
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function edit(Garage $garage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Garage $garage)
    {
        $input=$request->all();
        $garage->nom=$input["nom"];
        $garage->description=$input["description"];
        $garage->longitude=$input["longitude"];
        $garage->latitude=$input["latitude"];
        $garage->heureOurverture=$input["heureOurverture"];
        $garage->heureFermeture=$input["heureFermeture"];
        $garage->disponibilite=$input["disponibilite"];
        $garage->adresse=$input["adresse"];
        $garage->image=$input["image"];
        $garage->zone_id=$input["zone_id"];

        $garage->save();
        return response()->json([
            "success"=>true,
            "message"=>"update successfully",
            "data"=>$garage
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Garage  $garage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Garage $garage)
    {
        $garage->delete();
        return response()->json($garage);
    }
}
