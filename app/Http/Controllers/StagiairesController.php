<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StagiairesController extends Controller
{
    public function index(){
        $absences = DB::table("stagiaires")->select("stagiaires.id as stagiaire_id", "tel", "stagiaires.ville as stagiaireVille", "datenaissance", "dateinscription","stagiaires.nom as stagiaireNom", "stagiaires.prenom as stagiairePrenom","utilisateurs.nom as formateurNom", "utilisateurs.prenom as formateurPrenom","groupe", "filiere")->join("groupes", "stagiaires.groupe_id", "groupes.id")->join("filieres", "groupes.filiere_id", "filieres.id")->join("affectation", "groupes.id", "affectation.groupe_id")->join("utilisateurs", "affectation.utilisateur_id", "utilisateurs.id")->orderBy("dateinscription", "desc")->paginate(9);
        return view("admin.stagiaires", ["absences"=>$absences]);
    }
}
