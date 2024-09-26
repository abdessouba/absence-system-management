<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    protected $table = "affectation";
    protected $guarded = [];
    public $timestamps = false;
    use HasFactory;
}
