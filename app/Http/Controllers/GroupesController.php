<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupesController extends Controller
{
    public function create(){
        return view("admin.groupe");
    }
}
