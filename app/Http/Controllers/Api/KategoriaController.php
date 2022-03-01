<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\kategoriak;
use App\Http\Controllers\Controller;

class KategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriak = kategoriak::all();
        return response()->json($kategoriak);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategoriak  $kategoria
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $kategoria = Kategoriak::find($id);
        if (is_null($kategoria)) {
            return response()->json(["message" => "A megadott azonosítóval nem található kategória."], 404);
        }
        return response()->json($kategoria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategoriak  $kategoria
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategoriak  $kategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kategoriak $kategoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategoriak  $kategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(kategoriak $kategoria)
    {
        //
    }
}

