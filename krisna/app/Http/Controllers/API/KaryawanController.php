<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\http\Requests\KaryawanRequest;

class KaryawanController extends Controller
{
    function get($id = null)
    {
        if (isset($id)) {
            $karyawan = Karyawan::find($id);
            if ($karyawan) {
                return response()->json(['msg' => 'Data retrieved', 'data' => $karyawan], 200);
            } else {
                return response()->json(['msg' => 'Data Not Found', 'data' => []], 200);
            }
        } else {
            $karyawan = Karyawan::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $karyawan], 200);
        }
    }

    function store(KaryawanRequest $request)
    {
        $karyawan = Karyawan::create($request->all());
        return response()->json(['msg' => 'Data created', 'data' => $karyawan], 201);
    }

    function update($id, KaryawanRequest $request)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            $karyawan->update($request->all());
            return response()->json(['msg' => 'Data updated', 'data' => $karyawan], 200);
        } else {
            return response()->json(['msg' => 'Data Not Found', 'data' => []], 405);
        }
    }

    function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
