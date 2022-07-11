<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Http\Requests\JabatanRequest;


class JabatanController extends Controller
{
    function get($id = null)
    {
        if (isset($id)) {
            $jabatan = Jabatan::find($id);
            if ($jabatan) {
                return response()->json(['msg' => 'Data retrieved', 'data' => $jabatan], 200);
            } else {
                return response()->json(['msg' => 'Data Not Found', 'data' => []], 200);
            }
        } else {
            $jabatan = Jabatan::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $jabatan], 200);
        }
    }

    function store(JabatanRequest $request)
    {
        $jabatan = Jabatan::create($request->all());
        return response()->json(['msg' => 'Data created', 'data' => $jabatan], 201);
    }

    function update($id, JabatanRequest $request)
    {
        $jabatan = Jabatan::find($id);
        if ($jabatan) {
            $jabatan->update($request->all());
            return response()->json(['msg' => 'Data updated', 'data' => $jabatan], 200);
        } else {
            return response()->json(['msg' => 'Data Not Found', 'data' => []], 405);
        }
    }

    function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
