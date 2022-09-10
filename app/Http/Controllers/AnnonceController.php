<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces=Annonce::all();
        return response()->json($annonces);
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
        $annonce=new Annonce();
        if($request->file('urlImage')){
            $completeFileNmae = $request->file('urlImage')->getClientOriginalName();
            $fileNmaeOnLy=pathinfo($completeFileNmae,PATHINFO_FILENAME);
            $extension=$request->file('urlImage')->getClientOriginalExtension();
            $fileName=str_replace(' ','_',$fileNmaeOnLy).'-'.rand().'_'.time().'.'.$extension;
            $path = $request->file('urlImage')->storeAs('annonces/', $fileName, 'public');
            $annonce->urlImage = '/storage/'.$path;
        }
        $annonce->titre=$request["titre"];
        $annonce->description=$request["description"];
        $annonce->prix=$request["prix"];
        $annonce->datePublication=Carbon::now()->toDateTimeString();
        $annonce->typeAnnonce_id=$request["typeAnnonce_id"];
        $annonce->utilisateur_id=$request["utilisateur_id"];

        $annonce->save();
        return response()->json($annonce);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function cloturer($id){
            $annonce=Annonce::find($id);
            $annonce->cloture=!$annonce->cloture;
            $annonce->save();
            return $annonce;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
