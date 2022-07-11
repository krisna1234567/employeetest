<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Http\Requests\LevelRequest;


class LevelController extends Controller
{
    function get($id = null)
    {
        if (isset($id)) {
            $level = Level::find($id);
            if ($level) {
                return response()->json(['msg' => 'Data retrieved', 'data' => $level], 200);
            } else {
                return response()->json(['msg' => 'Data Not Found', 'data' => []], 200);
            }
        } else {
            $level = Level::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $level], 200);
        }
    }

    function store(LevelRequest $request)
    {
        $jabatan = Level::create($request->all());
        return response()->json(['msg' => 'Data created', 'data' => $jabatan], 201);
    }

    function update($id, LevelRequest $request)
    {
        $jabatan = Level::find($id);
        if ($jabatan) {
            $jabatan->update($request->all());
            return response()->json(['msg' => 'Data updated', 'data' => $jabatan], 200);
        } else {
            return response()->json(['msg' => 'Data Not Found', 'data' => []], 405);
        }
    }

    function destroy($id)
    {
        $jabatan = Level::findOrFail($id);
        $jabatan->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
