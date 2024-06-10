<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index() //(funtion index atau sbg method)
    {
        $data = [
            "title" => "Petaku"
        ];
        if (auth()->check()) {
            return view('index', $data);
        } else {
            return view('index-public', $data); //Digunakan untuk memanggil view index-public (file view index-public.blade.php)
        }
    }

    public function table()
    {
        $data = [
            "title" => "Table"
        ];
        return view('table', $data);
    }
}
