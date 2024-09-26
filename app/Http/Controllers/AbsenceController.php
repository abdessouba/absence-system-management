<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsenceController extends Controller
{
    public function index(){
        return view("index");
    }
    public function show($id){
        $stagiaire_infos = DB::table("stagiaires")
        ->where("stagiaires.id", $id)
        ->join("groupes", "stagiaires.groupe_id", "groupes.id")
        ->join("filieres", "groupes.filiere_id", "filieres.id")
        ->join("secteur", "filieres.secteur_id", "secteur.id")
        ->first();

        // $stagiaire_absences = DB::table("absences")
        // ->where("stagiaire_id", $id)
        // ->join("etat_absences", "absences.etat_absence_id", "etat_absences.id")
        // ->join("seance", "absences.id", "absences.seance_id")
        // ->get();
        $stagiaire_absences = DB::table("seance")
        ->join("absences", "seance.id", "absences.seance_id")
        ->where("stagiaire_id", $id)
        ->join("etat_absences", "absences.etat_absence_id", "etat_absences.id")
        ->orderBy("datedebut")
        ->get();
        // dd($stagiaire_absences);
        return view("stagiaire.show", ["stagiaire_infos"=>$stagiaire_infos, "stagiaire_absences"=>$stagiaire_absences]);
    }
}
