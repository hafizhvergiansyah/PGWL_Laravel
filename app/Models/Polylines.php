<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Polylines extends Model
{
    use HasFactory;

    protected $table = 'table_polylines';

    protected $guarded = ['id'];

    public function polylines()
    {
        return $this->select(DB::raw('id, name, description, ST_AsGeoJSON(geom) as geom, created_at, updated_at'))->get();
    }
}
