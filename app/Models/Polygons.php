<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Polygons extends Model
{
    use HasFactory;
    protected $table = 'table_polygons';

    protected $guarded = ['id'];

    public function polygons()
{
    return $this->select(DB::raw('id, name, description, ST_AsGeoJSON(geom) as geom, created_at, updated_at'))->get();
}

}

