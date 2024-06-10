<?php

namespace App\Http\Controllers;
use App\Models\Points;
use App\Models\Polylines;
use App\Models\Polygons;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function __construct()
    {
        $this->points = new Points();
        $this->polylines = new Polylines();
        $this->polygons = new Polygons();
    }

    public function index()
    {
        $data=[
        "title" =>"Peta",
        "total_points" => $this->points->count(),
        "total_polylines" => $this->polylines->count(),
        "total_polygons" => $this->polygons->count(),
        ];

        return view('dashboard', $data);
        }
}
