<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Soal2Controller extends Controller
{
    function get($angka)
    {
        return response()->json(['output' => $this->rupiah($angka), 'terbilang' => $this->terbilang($angka)], 200);
    }
    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . " milyar" . $this->penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . " trilyun" . $this->penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }
    function terbilang($nilai)

    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil; // konversi varibael $callback menjadi JSON

        // return $hasil;
    }
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp. " . number_format($angka, 0, ",", ",");
        return $hasil_rupiah;
    }
    public function test()
    {
        $star = 10;
        $char = [];
        for ($a = $star; $a > 0; $a--) {
            for ($i = 1; $i <= $a; $i++) {
                $char = '&nbsp';
            }
            for ($a1 = $star; $a1 >= $a; $a1--) {
                $char = "*";
            }
            $char = "<br>";
        }


        return response($char, 200)
            ->header('Content-Type', 'text/html');
    }
}
