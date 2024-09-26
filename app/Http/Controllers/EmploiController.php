<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmploiController extends Controller
{
    public function index(){
        return view("emploi.index");
    }
    public function show(Request $request){
        return view("emploi.show");
    }
}
