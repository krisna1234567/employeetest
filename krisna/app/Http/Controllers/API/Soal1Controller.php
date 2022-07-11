<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Soal1Controller extends Controller
{
    public function index($type, $angka)
    {

        $data = $angka;
        $type = $type;
        return view('bintang', compact('data', 'type'));
    }
}
