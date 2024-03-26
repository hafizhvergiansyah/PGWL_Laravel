<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polygons extends Model
{
    use HasFactory;
    protected $table = 'table_polygons';

    protected $guarded = ['id'];

}
