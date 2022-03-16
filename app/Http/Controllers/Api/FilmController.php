<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use App\Models\filmkategoriai;
use App\Models\kategoriak;
use App\Models\rendezok;
use App\Models\szineszek;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
         /*foreach (Film::all() as $film) {
            $filmek[] = [
            'id' => $film->id,
            'cim' => $film->cim,
            'leiras'=> $film->leiras,
            'megjelenesiEv'=> $film->megjelenesiEv,
            'ertekeles'=> $film->ertekeles,
            'imgUrl'=> $film->imageUrl,
            'kategoriak' => $film->kategoriak,
            'szineszek' =>$film->szineszek,
            'rendezoNev' =>$film->rendezok
            ];
        }*/
        return response()->json($filmek);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $film = new Film();
        $film->fill($request->only(['cim','leiras','megjelenesiEv','ertekeles','imageUrl']));
        $film->save();
        foreach($request->input('kategoriak') as $kategoria){
            $kat=kategoriak::find($kategoria['id']);
            $film->kategoriak()->attach($kat);

        }
        foreach($request->input('rendezok') as $rendezo){
            $rend=rendezok::find(Arr::get($rendezo,'id'));
            $film->rendezok()->attach($rend);

        }
        foreach($request->input('szineszek') as $szinesz){
            $szin=szineszek::find(Arr::get($szinesz,'id'));
            $film->szineszek()->attach($szin);
        }

        return response()->json($film, 201);

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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $film = Film::find($id);
        if (is_null($film)) {
            return response()->json(["message" => "A megadott azonosítóval nem található film."], 404);
        }
        $film->fill($request->only(['cim','leiras','megjelenesiEv','ertekeles','imageUrl']));
        $film->save();
        $film->kategoriak()->detach();
        $film->szineszek()->detach();
        $film->rendezok()->detach();
        foreach($request->input('kategoriak') as $kategoria){
            $kat=kategoriak::find($kategoria['id']);
            $film->kategoriak()->attach($kat);

        }
        foreach($request->input(['rendezok']) as $rendezo){
            $rend=rendezok::find(Arr::get($rendezo,'id'));
            $film->rendezok()->attach($rend);

        }
        foreach($request->input(['szineszek']) as $szinesz){
            $szin=szineszek::find(Arr::get($szinesz,'id'));
            $film->szineszek()->attach($szin);

        }
        return response()->json($film, 201);
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
