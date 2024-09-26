<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'ville',
        'pays',
        'tel',
        'email',
        'photo',
        'datenaissance',
        'dateinscription',
        'groupe_id',
    ];
}
