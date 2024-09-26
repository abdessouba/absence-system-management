<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::all();
        return view("admin.formateur", ["utilisateurs" => $utilisateurs]);
    }

    public function show(Utilisateur $utilisateur)
    {
        $groupes = DB::table("affectation")
            ->join("groupes", "affectation.groupe_id", "=", "groupes.id")
            ->join("filieres", "groupes.filiere_id", "=", "filieres.id")
            ->select("groupes.*", "filieres.filiere")
            ->where("affectation.utilisateur_id", "=", $utilisateur->id)
            ->get();

        $data = DB::table("secteur")
            ->leftJoin("filieres", "secteur.id", "=", "filieres.secteur_id")
            ->leftJoin("groupes", "filieres.id", "=", "groupes.filiere_id")
            ->select("secteur.id as secteur_id", "secteur.secteur", "filieres.id as filiere_id", "filieres.filiere", "groupes.id as groupe_id", "groupes.groupe")
            ->get();

        $secteurs = [];

        foreach ($data as $result) {
            if (!isset($secteurs[$result->secteur_id])) {
                $secteurs[$result->secteur_id] = [
                    'id' => $result->secteur_id,
                    'secteur' => $result->secteur,
                    'filieres' => []
                ];
            }

            if (!isset($secteurs[$result->secteur_id]['filieres'][$result->filiere_id])) {
                $secteurs[$result->secteur_id]['filieres'][$result->filiere_id] = [
                    'id' => $result->filiere_id,
                    'filiere' => $result->filiere,
                    'groupes' => []
                ];
            }

            $secteurs[$result->secteur_id]['filieres'][$result->filiere_id]['groupes'][] = [
                'id' => $result->groupe_id,
                'groupe' => $result->groupe
            ];
        }

        return view("admin.formateur_show", ["formateur" => $utilisateur, "secteurs" => $secteurs, "groupes" => $groupes]);
    }
}
