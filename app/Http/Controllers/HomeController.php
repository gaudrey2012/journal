<?php

namespace App\Http\Controllers;

use App\Models\Actualites;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = Actualites::count();;
        $categorie=Categories::count();
        $last = Actualites::orderBy('id', 'desc')->take(5)->get();
        $actualite=Actualites::all();

       
        $evolution_creation_cat_ = [];
        $evolution_creation_cat = Categories::select([
            DB::raw('count(id) as `nombre`'),
            DB::raw('DATE(created_at) as day')
        ])->groupBy('day')->orderBy('day','asc')
        ->get()->toArray();
        for ($i=0; $i < \sizeof($evolution_creation_cat); $i++) { 
            $evolution_creation_cat_[] = [mktime(0, 0, 0, explode("-",$evolution_creation_cat[$i]['day'])[1], explode(" ", explode("-",$evolution_creation_cat[$i]['day'])[2])[0], explode("-",$evolution_creation_cat[$i]['day'])[0])*1000,
            $evolution_creation_cat[$i]['nombre']];
        }


        $evolution_creation_actu_ = [];
        $evolution_creation_actu = Actualites::select([
            DB::raw('count(id) as `nombre`'),
            DB::raw('DATE(created_at) as day')
        ])->groupBy('day')->orderBy('day','asc')
        ->get()->toArray();
        for ($i=0; $i < \sizeof($evolution_creation_actu); $i++) { 
            $evolution_creation_actu_[] = [mktime(0, 0, 0, explode("-",$evolution_creation_actu[$i]['day'])[1], explode(" ", explode("-",$evolution_creation_actu[$i]['day'])[2])[0], explode("-",$evolution_creation_actu[$i]['day'])[0])*1000,
            $evolution_creation_actu[$i]['nombre']];
        }


       

        $news= Actualites::select('*')
                        ->whereBetween('created_at', 
                            [Carbon::now()->subMonth(3), Carbon::now()]
                        )
                        ->get();
        return view('home', compact('actualite', 'count', 'last','news', 'categorie', 'evolution_creation_cat_', 'evolution_creation_actu_'));
    }

}
