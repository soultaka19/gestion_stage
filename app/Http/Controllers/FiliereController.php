<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = filiere::all();
        return view('filiere.index',compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filiere.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_filiere' => 'required',
        ]);
        $filiere = new filiere([
            'nom_filiere' => $request->get('nom_filiere')
        ]);
        $filiere->save();
        return redirect('/')->with('success','filiere creer avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filiere = filiere::findOrFail($id);
        return view('filiere.show',compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filiere = filiere::findOrFail($id);
        return view('filiere.edit',compact('filiere'));
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
        $request->validate([
            'nom_filiere' => 'required'
        ]);
        $filiere = filiere::findOrFail($id);
        $filiere->nom_filiere = $request->get('nom_filiere');

        $filiere->update();
        return redirect('/')->with('success','filiere modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filiere = filiere::findOrFail($id);
        $filiere->delete();

        return redirect('/')->with('success','filiere supprime avec succes');
    }
}
