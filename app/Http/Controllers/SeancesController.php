<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeancesController extends Controller
{
    public function index(){
        // retrieve array of seance and for each seance array of abseces
        $results = DB::table("seance")
        ->select(["seance.id", "datedebut", "datefin", "etat", "type", "intitule", "salle", "groupe", "nom", "prenom", "photo", "etat_absence", "stagiaire_id", "etat_absence_id"])
        ->join("salles", "seance.salle_id", "salles.id")
        ->join("modules", "seance.module_id", "modules.id")
        ->join("etats", "seance.etat_id", "etats.id")
        ->join("types", "seance.type_id", "types.id")
        ->join("groupes", "seance.groupe_id", "groupes.id")
        ->leftJoin("absences", "seance.id", "absences.seance_id")
        ->leftJoin("stagiaires", "absences.stagiaire_id", "stagiaires.id")
        ->leftJoin("etat_absences", "absences.etat_absence_id", "etat_absences.id")
        ->where("seance.formateur_id", Auth::user()->id)
        ->orderBy("datedebut", "desc")
        ->get();
        $seance_absences = [];
        foreach ($results as $value) {
            $seance_absences[$value->id]["id"] = $value->id;
            $seance_absences[$value->id]["datedebut"] = $value->datedebut;
            $seance_absences[$value->id]["datefin"] = $value->datefin;
            $seance_absences[$value->id]["etat"] = $value->etat;
            $seance_absences[$value->id]["type"] = $value->type;
            $seance_absences[$value->id]["intitule"] = $value->intitule;
            $seance_absences[$value->id]["salle"] = $value->salle;
            $seance_absences[$value->id]["groupe"] = $value->groupe;
            // absences
            if($value->stagiaire_id != null){
                $seance_absences[$value->id]["absences"][$value->stagiaire_id]["nom"] = $value->nom;
                $seance_absences[$value->id]["absences"][$value->stagiaire_id]["prenom"] = $value->prenom;
                $seance_absences[$value->id]["absences"][$value->stagiaire_id]["photo"] = $value->photo;
                $seance_absences[$value->id]["absences"][$value->stagiaire_id]["etat_absence"] = $value->etat_absence;
                $seance_absences[$value->id]["absences"][$value->stagiaire_id]["etat_absence_id"] = $value->etat_absence_id;
            }
        }
        return view("seances.index", ["seance_absences" => $seance_absences]);
    }
}
