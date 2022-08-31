<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\Service;
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
        if($request->file('image')){
            $completeFileNmae = $request->file('image')->getClientOriginalName();
            $fileNmaeOnLy=pathinfo($completeFileNmae,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $fileName=str_replace(' ','_',$fileNmaeOnLy).'-'.rand().'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('garage/', $fileName, 'public');
            $garage->image = '/storage/'.$path;
        }
        $garage->nom=$request["nom"];
        $garage->description=$request["description"];
        $garage->longitude=$request["longitude"];
        $garage->latitude=$request["latitude"];
        $garage->heureOurverture=$request["heureOurverture"];
        $garage->heureFermeture=$request["heureFermeture"];
        $garage->adresse=$request["adresse"];
        $garage->telephone=$request["telephone"];
        $garage->zone_id=$request["zone_id"];
        $garage->Utilisateur_id=$request["Utilisateur_id"];
        $servTab=explode(",",$request["service"]);
        $garage->save();
        $service=Service::find($servTab);
        $garage->services()->attach($service);
        return response()->json($garage);


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id;
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $garage=Garage::with(['notes','services'])->get()->find($id);
        return response()->json($garage);
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
        $garage=new Garage();
        if($request->file('image')){
            $completeFileNmae = $request->file('image')->getClientOriginalName();
            $fileNmaeOnLy=pathinfo($completeFileNmae,PATHINFO_FILENAME);
            $extension=$request->file('image')->getClientOriginalExtension();
            $fileName=str_replace(' ','_',$fileNmaeOnLy).'-'.rand().'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('garage/', $fileName, 'public');
            $garage->image = '/storage/'.$path;
        }
        $garage->nom=$request["nom"];
        $garage->description=$request["description"];
        $garage->longitude=$request["longitude"];
        $garage->latitude=$request["latitude"];
        $garage->heureOurverture=$request["heureOurverture"];
        $garage->heureFermeture=$request["heureFermeture"];
        $garage->adresse=$request["adresse"];
        $garage->telephone=$request["telephone"];
        $garage->zone_id=$request["zone_id"];
        $garage->Utilisateur_id=$request["Utilisateur_id"];

        $garage->save();
        return response()->json($garage);
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
