<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\filmkategoriai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $filmek = DB::table('filmek')->Select('*')->get();
        $filmek = Film::select('filmek.cim as cim', 'filmek.leiras as leiras', 
                       'filmek.megjelenesiEv as megjelenesiEv', 'filmek.ertekeles as ertekeles',
                       'filmek.imageUrl as imageUrl', 'rendezok.rendezoNev as rendezoNev')
                        ->selectRaw("group_concat(distinct(kategoriak.kategoria)) as kategoriak")
                        ->selectRaw("group_concat(szineszek.szineszNev) as szineszek")
                        ->join("filmkategoriai", "filmkategoriai.filmId", "=", "filmek.id")
                        ->join("kategoriak", "kategoriak.id", "=", "filmkategoriai.kategoriaId")
                        ->join("filmrendezoi", "filmrendezoi.filmId", "=", "filmek.id")
                        ->join("rendezok", "rendezok.id", "=", "filmrendezoi.rendezoId")
                        ->join("filmszineszei", "filmszineszei.filmId", "=", "filmek.id")
                        ->join("szineszek", "szineszek.id", "=", "filmszineszei.szineszId")
                        ->groupBy("filmek.id")
                        ->get();
        return view('welcome', ['filmek' => $filmek]);
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
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
    }
}
