<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\rendezok;
use App\Http\Controllers\Controller;
use App\Http\Requests\RendezoStoreRequest;
use App\Http\Requests\RendezoUpdateRequest;
use App\Http\Requests\SzineszStoreRequest;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), (new RendezoStoreRequest())->rules());
        if ($validator->fails()) {
            $errormsg = "";
            foreach ($validator->errors()->all() as $error) {
                $errormsg .= $error . " ";
            }
            $errormsg = trim($errormsg);
            return response()->json($errormsg, 400);
        }
        $rendezo = new rendezok();
        $rendezo->fill($request->all());
        $rendezo->save();
        return response()->json($rendezo, 201);
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
    public function update(Request $request, int $id)
    {
        if ($request->isMethod('PUT')) {
            $validator = Validator::make($request->all(), (new RendezoUpdateRequest())->rules());
            if ($validator->fails()) {
                $errormsg = "";
                foreach ($validator->errors()->all() as $error) {
                    $errormsg .= $error . " ";
                }
                $errormsg = trim($errormsg);
                return response()->json($errormsg, 400);
            }
        }
        $rendezo = rendezok::find($id);
        if (is_null($rendezo)) {
            return response()->json(["message" => "A megadott azonosítóval nem található rendező."], 404);
        }
        $rendezo->fill($request->all());
        $rendezo->save();
        return response()->json($rendezo, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rendezok  $rendezo
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $rendezo = rendezok::find($id);
        if (is_null($rendezo)) {
            return response()->json(["message" => "A megadott azonosítóval nem található rendező."], 404);
        }
        rendezok::destroy($id);
        return response()->noContent();
    }
}

