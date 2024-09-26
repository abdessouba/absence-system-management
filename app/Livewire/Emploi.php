<?php

namespace App\Livewire;

use App\Models\Groupe;
use DateTime;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\On; 

class Emploi extends Component
{
    public $groupe_id = 1;
    public $groupes = [];

    public $jours = [];
    public $modules = [];
    public $salles = [];
    public $types = [];
    public $jours_id;
    public $heure_debut = "08:30:00";
    public $heure_fin = "13:30:00";
    public $module_id;
    public $salle_id;
    public $type_id;

    public $emplois = [];

    public function submit()
    {
        $emploi = Emploi::create([
            "salles_id" => $this->salle_id,
            "formateurs_id" => 1, // formateur is authentificated
            "groupe_id" => 1, // later
            "temporaire" => null,
            "jours_id" => $this->jours_id,
            "heure_debut" => "$this->heure_debut",
            "heure_fin" => "$this->heure_fin",
        ]);
        if ($emploi) {
            return back();
        }
    }
    #[On('refresh')] 
    public function refresh(){
        $this->emplois = $this->getEmploiValues();
    }

    public function getEmploiValues(){
        return DB::table("emplois")
        ->leftJoin("salles", "emplois.salles_id", "=", "salles.id")
        ->leftJoin("formateurs", "emplois.formateurs_id", "=", "formateurs.id")
        ->leftJoin("groupes", "emplois.groupe_id", "=", "groupes.id")
        ->select(
            "emplois.id",
            "emplois.heure_debut",
            "emplois.heure_fin",
            "emplois.salles_id",
            "emplois.types_id",
            "emplois.jours_id",
            "emplois.groupe_id",
            "groupes.groupe",
            "formateurs.nom",
            "formateurs.prenom",
        )
        ->where("groupe_id", $this->groupe_id)
        ->orderBy("jours_id")
        ->get();
    }

    public function render()
    {
        // get all groupes
        $this->groupes = Groupe::orderBy('groupe')->get();

        $this->emplois = $this->getEmploiValues();
    
        // dd($this->emplois);
        // DB::table("groupes")
        // ->join("emplois", "groupes.id", '=', "emplois.groupe_id")
        // ->join("emplois", "groupes.id", '=', "emplois.groupe_id")
        // ->where('groupes.id', $this->groupe_id)
        // ->orderBy("jours_id")
        // ->get();

        $this->jours = DB::table("jours")->get();
        $this->modules = DB::table("modules")->get();
        $this->salles = DB::table("salles")->get();
        $this->types = DB::table("types")->get();

        return view('livewire.emploi');
    }
}
