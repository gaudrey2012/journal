<?php

namespace App\Http\Controllers;

use App\Models\Actualites;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Exports\ActualitesExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Actualites::class);
        $categorie = Categories::All();
        $actualite=Actualites::all();
        return view('actualite.index', compact('actualite', 'categorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Actualites::class);
        $categorie=Categories::all();
        return view('actualite.create',compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actualite = new Actualites;
        $validated = $request->validate([
            'titre' => 'required|min:3',
            'description' => 'required',
        ]);
        $actualite->titre = $request->input('titre');
        $actualite->sous_titre = $request->input('description');
        $actualite->categorie_id = $request->input('category');
        $actualite->user_id = Auth::user()->id;
        $actualite->save();
        
        return redirect()->route('actualite.index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Actualites $actualite)
    {
        $this->authorize('update', $actualite);
        $categorie=Categories::all();
        return view('actualite.edit', compact('actualite', 'categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actualites $actualite)
    {
        $this->authorize('update', $actualite);
        $validated = $request->validate([
            'titre' => 'required|min:3',
            'description' => 'required',
        ]);
        $actualite->titre = $request->input('titre');
        $actualite->sous_titre = $request->input('description');
        $actualite->categorie_id = $request->input('category');
        $actualite->user_id = Auth::user()->id;
        $actualite->save();
        return redirect()->route('actualite.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actualites $actualite)
    {
        $this->authorize('delete', $actualite);
        $actualite->delete();
        return redirect()->route('actualite.index');
    }

    public function export() 
    {
        return Excel::download(new ActualitesExport, 'Actualites.xlsx');
    }
   
}
