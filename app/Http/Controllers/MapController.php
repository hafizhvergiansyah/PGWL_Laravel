<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index() //(funtion index atau sbg method)
    {
        $data = [
            "title"=> "Petaku"
        ];

        return view('index', $data); //Digunakan untuk memanggil view index (file view index.blade.php)
    }

    public function table()
    {
        $data =[
            "title" => "Table"
        ];
        return view ('table', $data);
    }
}
