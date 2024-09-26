<?php

namespace App\Livewire;

use App\Models\Absence;
use App\Models\Module;
use App\Models\Salle;
use App\Models\Seance;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class SeanceSection extends Component
{
    public $groupes = [];
    public $modules = [];
    public $salles = [];
    public $types = [];
    public $etat_absences = [];
    public $date;
    public $groupe_id = 1;
    public $stagiaire_absence_array = [];
    public $seance;
    public $seance_absences = [];

    // form fields
    public $heure_debut;
    public $heure_fin;
    public $type_id;
    public $salle_id;
    public $module_id;

    public $toEditStagiaire;
    public $observation = "33";

    public function edit_seance($id){
        $this->seance = Seance::findOrFail($id);
    }

    public function handleUpdateForm(){
        $this->seance->update([
            "datedebut" => $this->date." ".$this->heure_debut,
            "datefin" => $this->date." ".$this->heure_fin,
            "etat_id" => $this->etat_id,
            "type_id" => $this->type_id,
            "module_id" => $this->module_id,
            "salle_id" => $this->salle_id,
        ]);
        // $seance_created = Seance::create([
        //     "datedebut" => $this->date." ".$this->heure_debut,
        //     "datefin" => $this->date." ".$this->heure_fin,
        //     "etat_id" => 1,
        //     "type_id" => $this->type_id,
        //     "formateur_id" => 1,
        //     "module_id" => $this->module_id,
        //     "salle_id" => $this->salle_id,
        // ]);

    }

    public function refresh(){
        $this->seance = null;
    }

    #[On("handleStagiaireAbsenceUpdate")]
    public function handleStagiaireAbsenceUpdate($params){
        $this->toEditStagiaire = DB::table("absences")->join("stagiaires", "absences.stagiaire_id", "stagiaires.id")->where("seance_id", $params["formSeanceId"])->where("stagiaire_id", $params["absenceStagiaireId"])->first();
    }

    public function handleStagiaireAbsenceUpdateFullForm(){
        dd("gg");
    }
    public function test(){
        dump("gg");
    }

    public function render()
    {
        $this->date =  Carbon::now()->format('Y-m-d');
        $this->modules = Module::all();
        $this->salles = Salle::all();
        $this->types = Type::all();
        $this->etat_absences = DB::table("etat_absences")->get();
        $this->groupes = DB::table("affectation")->select("groupes.id as groupe_id", "groupe")->join("utilisateurs", "affectation.id", "utilisateur_id")->join("groupes", "affectation.id", "groupe_id")->where("utilisateur_id", "=", 1)->get();
        return view('livewire.seance-section');
    }
}
