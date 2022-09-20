<?php

namespace App\Http\Controllers;


use PDF;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Exports\CategoriesExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Categories::class);
        $categorie = Categories::paginate(10);
        return view('categorie.index', compact('categorie')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Categories::class);
       return view('categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorie=new Categories();
        $validated = $request->validate([
            'title' => 'required|min:3',
            'subtitle' => 'required',
        ]);
        $categorie->title = $request->input('title');
        $categorie->subtitle = $request->input('subtitle');
        $categorie->user_id = Auth::user()->id;
        $categorie->save();
        return redirect()->route('categorie.index');
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
    public function edit(Categories $categorie)
    {
        $this->authorize('update', $categorie);
        return view('categorie.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categorie)
    {
        $this->authorize('update', $categorie);
        $categorie = $request->validate([
            'title' => 'required|min:3',
            'subtitle' =>'required|min:3',
        ]);
        $categorie->title = $request->input('title');
        $categorie->subtitle = $request->input('subtitle');
        $categorie->user_id = Auth::user()->id;
        $categorie->save();
        return redirect()->route('categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categorie)
    {
        $this->authorize('delete', $categorie);
        $categorie->delete();
        return redirect()->route('categorie.index');
    }

    public function export() 
    {
        return Excel::download(new CategoriesExport, 'Categories.xlsx');
    }

    public function pdf()
    {
        $categorie = Categories::all();
           
        $pdf = PDF::loadView('pdf', compact('categorie'));
     
        return $pdf->download('categorie.pdf');
    }
}
