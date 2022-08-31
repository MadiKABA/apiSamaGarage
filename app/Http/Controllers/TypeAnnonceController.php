<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\TypeAnnonce;
use Illuminate\Http\Request;

class TypeAnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeAnnonces=TypeAnnonce::all();
        return response()->json($typeAnnonces);
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
        $typeAnnonce=TypeAnnonce::create($request->all());
        return response()->json($typeAnnonce);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typrAnnonces=TypeAnnonce::find($id);
        return response()->json($typrAnnonces);
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
     * @param  \App\Models\TypeAnnonce  $typrAnnonce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeAnnonce  $typrAnnonce)
    {
        $typrAnnonce->libelle=$request["libelle"];
        $typrAnnonce->save();
        return response()->json($typrAnnonce);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typrAnnonce=TypeAnnonce::find($id);
        $typrAnnonce->delete();
        return response()->json($typrAnnonce);
    }
}
