<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    public function index()
    {
        $filmek = Film::table('filmek')
            ->join('filmkategoria', "filmkategoriai.filmId", "=", "filmek.FilmID")
            ->join('kategoriak ', "kategoriak.KategoriaID", "=", "filmkategoriai.kategoriaId")
            ->join('filmrendezoi ', "filmrendezoi.filmId ", "=", "filmek.FilmID")
            ->join('rendezok ', "rendezok.rendezoId", "=", "filmrendezoi.rendezoId")
            ->join('filmszineszei ', "filmszineszei.filmId ", "=", "filmek.FilmID")
            ->join('szineszek ', "szineszek.szineszId", "=", "filmszineszei.szineszId")
            ->select("Cim", "leiras", "MegjelenesiEv", "Ertekeles", "imageUrl", "Kategoria", "szineszNev", "rendezoNev")
            ->take(10)
            ->get();
        //
        return view('welcome', ['filmek'=> $filmek]);
    }

}
