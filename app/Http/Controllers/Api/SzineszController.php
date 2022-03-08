<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SzineszStoreRequest;
use App\Models\szineszek;
use Illuminate\Support\Facades\Validator;

class SzineszController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $szineszek = szineszek::all();
        return response()->json($szineszek);
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
        $validator = Validator::make($request->all(), (new SzineszStoreRequest())->rules());
        if ($validator->fails()) {
            $errormsg = "";
            foreach ($validator->errors()->all() as $error) {
                $errormsg .= $error . " ";
            }
            $errormsg = trim($errormsg);
            return response()->json($errormsg, 400);
        }
        $szinesz = new szineszek();
        $szinesz->fill($request->all());
        $szinesz->save();
        return response()->json($szinesz, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\szineszek  $szinesz
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $szinesz = szineszek::find($id);
        if (is_null($szinesz)) {
            return response()->json(["message" => "A megadott azonosítóval nem található színész."], 404);
        }
        return response()->json($szinesz);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\szineszek  $szinesz
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\szineszek  $szinesz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, szineszek $szinesz)
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
        $szinesz = szineszek::find($id);
        if (is_null($szinesz)) {
            return response()->json(["message" => "A megadott azonosítóval nem található színész."], 404);
        }
        szineszek::destroy($id);
        return response()->noContent();
    }
}

