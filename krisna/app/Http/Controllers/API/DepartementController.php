<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Http\Requests\DepartementRequest;


class DepartementController extends Controller
{
    function get($id = null)
    {
        if (isset($id)) {
            $departement = Departement::find($id);
            if ($departement) {
                return response()->json(['msg' => 'Data retrieved', 'data' => $departement], 200);
            } else {
                return response()->json(['msg' => 'Data Not Found', 'data' => []], 200);
            }
        } else {
            $departement = Departement::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $departement], 200);
        }
    }

    function store(DepartementRequest $request)
    {
        $departement = Departement::create($request->all());
        return response()->json(['msg' => 'Data created', 'data' => $departement], 201);
    }

    function update($id, DepartementRequest $request)
    {
        $departement = Departement::find($id);
        if ($departement) {
            $departement->update($request->all());
            return response()->json(['msg' => 'Data updated', 'data' => $departement], 200);
        } else {
            return response()->json(['msg' => 'Data Not Found', 'data' => []], 405);
        }
    }

    function destroy($id)
    {
        $departement = Departement::findOrFail($id);
        $departement->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
