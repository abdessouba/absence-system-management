<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\filiere;
use App\Models\Groupe;
use App\Models\Salle;
use App\Models\Stagiaire;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $stagiaire_count = Stagiaire::all()->count();
        $group_count = Groupe::all()->count();
        $filiere_count = filiere::all()->count();
        $formateur_count = Utilisateur::where("isAdmin", false)->count();
        $salle_count = Salle::all()->count();
        $absence_count = Absence::all()->count();

        $absence_count_justifiee = Absence::all()->where("etat_absence_id", 1)->count();
        $absence_count_non_justifiee = Absence::all()->where("etat_absence_id", 2)->count();
        $absence_count_autorise = Absence::all()->where("etat_absence_id", 3)->count();

        $absences = DB::table("absences")->select("stagiaire_id", "etat_absence_id", "stagiaires.nom as stagiaireNom", "stagiaires.prenom as stagiairePrenom", "datedebut", "datefin", "utilisateurs.nom as formateurNom", "utilisateurs.prenom as formateurPrenom", "etat_absence", "groupe", "filiere")->join("stagiaires", "absences.stagiaire_id", "stagiaires.id")->join("seance", "absences.seance_id", "seance.id")->join("utilisateurs", "seance.formateur_id", "utilisateurs.id")->join("etat_absences", "absences.etat_absence_id", "etat_absences.id")->join("groupes", "stagiaires.groupe_id", "groupes.id")->join("filieres", "groupes.filiere_id", "filieres.id")->orderBy("datedebut", "desc")->paginate(5);
        
        return view("admin.index", [
            "stagiaire_count" => $stagiaire_count,
            "group_count" => $group_count,
            "filiere_count" => $filiere_count,
            "formateur_count" => $formateur_count,
            "salle_count" => $salle_count,
            "absence_count" => $absence_count,
            "absence_count_justifiee" => $absence_count_justifiee,
            "absence_count_non_justifiee" => $absence_count_non_justifiee,
            "absence_count_autorise" => $absence_count_autorise,
            "absences" => $absences
        ]);
    }
}
