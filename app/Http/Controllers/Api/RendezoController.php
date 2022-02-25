<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\rendezok;
use App\Http\Controllers\Controller;

class RendezoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rendezok = rendezok::all();
        return response()->json($rendezok);
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
     * @param  \App\Models\rendezok  $rendezo
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $rendezo = rendezok::find($id);
        if (is_null($rendezo)) {
            return response()->json(["message" => "A megadott azonosítóval nem található rendező."], 404);
        }
        return response()->json($rendezo);
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
     * @param  \App\Models\rendezok  $rendezo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rendezok $rendezo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rendezok  $rendezo
     * @return \Illuminate\Http\Response
     */
    public function destroy(rendezok $rendezo)
    {
        //
    }
}

