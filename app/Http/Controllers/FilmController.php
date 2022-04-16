<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\filmkategoriai;
use App\Models\mentettfilmek;
use App\Models\szineszek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;
use function PHPUnit\Framework\isEmpty;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filmek = Film::paginate(16);
        $error = "";
        $search = "";
        return view('welcome', [
            'filmek' => $filmek,
            "error" => $error,
            "search" => $search
        ]);
    }
    
    public function indexWithError($error, $search)
    {
        $filmek = Film::paginate(16);
        return view('welcome', [
            'filmek' => $filmek,
            "error" => $error,
            "search" => $search
        ]);
    }

    public function search(Request $request)
    {
        $error = "";

        if($request->get("search") != ""){

            $search = $request->get("search");
            $filmek = Film::where('cim', 'LIKE', '%'.$search.'%')->paginate(16);
            $filmek->appends($request->all());

            if($filmek->count() > 0){
                return view('welcome', [
                    'filmek' => $filmek,
                    "error" => $error,
                    "search" => $search
                ]);

            } else {
                $error = "There was no film found for: ".$search;
                return FilmController::indexWithError($error, $search);
            }
        }

        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(int $filmId)
    {
        $film = Film::findOrFail($filmId);

        return view('film', ['film'=> $film]);
    }


    public function addToFavourites(Film $film) {
        $userId = Auth::user()->id;
        $mentettFilmek = new mentettfilmek();
        $mentettFilmek->film_id = $film->id;
        $mentettFilmek->user_id = $userId;
        $mentettFilmek->save();

        return redirect()->back();
    }
    public function removeFromFavourites(Film $film)
    {
        $userId = Auth::user()->id;
        $torlendoMentettFilm = mentettfilmek::where("film_id", "=", $film->id)->where("user_id", "=", $userId);
        $torlendoMentettFilm->delete();
        return redirect()->back();
    }
}
