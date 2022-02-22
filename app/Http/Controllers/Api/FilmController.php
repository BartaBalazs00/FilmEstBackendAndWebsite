<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $filmek = Film::all();
        /* foreach (Film::all() as $film) {
            $filmek[] = [
            'id' => $film->id,
            'cim' => $film->cim,
            'leiras'=> $film->leiras,
            'megjelenesiEv'=> $film->megjelenesiEv,
            'ertekeles'=> $film->ertekeles,
            'kategoriak' => $film->kategoriak,
            'szineszek' =>$film->szineszek,
            'rendezoNev' =>$film->rendezok
            ];
        } */
        return response()->json($filmek);
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
    public function show(int $id)
    {
        $film = Film::find($id);
        if (is_null($film)) {
            return response()->json(["message" => "A megadott azonosítóval nem található film."], 404);
        }
        return response()->json($film);
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
    public function destroy(int $id)
    {
        $film = Film::find($id);
        if (is_null($film)) {
            return response()->json(["message" => "A megadott azonosítóval nem található film."], 404);
        }
        Film::destroy($id);
        return response()->noContent();
    }
}
