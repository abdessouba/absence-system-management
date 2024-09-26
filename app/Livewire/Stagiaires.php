<?php

namespace App\Livewire;

use App\Models\Absence;
use App\Models\Groupe;
use App\Models\Module;
use App\Models\Salle;
use App\Models\Seance;
use App\Models\Stagiaire;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Stagiaires extends Component
{
    public $stagiaires = [];
    public $groupes = [];
    public $modules = [];
    public $salles = [];
    public $types = [];
    public $etat_absences = [];
    public $groupeId;

    public $absence = false;
    public $obervation = false;
    public $seance = false;
    public $stagiaireId;
    public $etat_absence_select;
    public $observation;
    public $fullName;
    public $stagiaire_absence_array = [];
    public $detail_absence_array = [];

    public $date;
    public $heure_debut = "08:30:00";
    public $heure_fin = "13:30:00";
    public $type_id = 1;
    public $module_id = 1;
    public $groupe_id;
    public $salle_id = 1;
    public $etat_id = 1;

    // to handle the absence model
    public function setAbsence($data)
    {
        $this->absence = $data;
    }

    // to handle the seance model
    public function handleAbsence()
    {
        $this->seance = true;
    }

    // to handle detail absence model
    public function setStagiaire($id)
    {
        $this->stagiaireId = $id;
        // check if there is already detail absence
        if (isset($this->detail_absence_array[$id])) {
            $this->observation = $this->detail_absence_array[$id]['observation'];
            $this->etat_absence_select = $this->detail_absence_array[$id]['etat_absence'];
        }
        $this->fullName = Stagiaire::find($id);
    }

    public function set_stagiaire_absence($id)
    {
        $this->stagiaire_absence_array["$id"] = $id;
    }

    public function handleAbsenceForm()
    {
        $this->detail_absence_array["$this->stagiaireId"] = ["etat_absence" => $this->etat_absence_select, "observation" => $this->observation];
        $this->stagiaireId = null;
        $this->observation = null;
        $this->etat_absence_select = null;
    }

    // final submit form
    public function handleAbsenceSeanceForm()
    {

        $seance_created = Seance::create([
            "datedebut" => $this->date . " " . $this->heure_debut,
            "datefin" => $this->date . " " . $this->heure_fin,
            "etat_id" => $this->etat_id,
            "type_id" => $this->type_id,
            "formateur_id" => Auth::user()->id,
            "module_id" => $this->module_id,
            "salle_id" => $this->salle_id,
            "groupe_id" => $this->groupe_id,
        ]);

        $seance_created_id = $seance_created->id;
        if (count($this->stagiaire_absence_array) > 0) {
            foreach ($this->stagiaire_absence_array as $id) {
                $stagiaire_observation = $this->detail_absence_array[$id]["observation"] ?? "";
                $stagiaire_etat_absence_id = $this->detail_absence_array[$id]["etat_absence"] ?? 2;
                $absence_created = Absence::create([
                    "seance_id" => $seance_created_id,
                    "stagiaire_id" => $id,
                    "etat_absence_id" => $stagiaire_etat_absence_id,
                    "observation" => $stagiaire_observation,
                ]);
            }
        }
    }
    public function refresh()
    {
        $this->js('window.location.reload()');
    }

    public function render()
    {
        $this->date =  Carbon::now()->format('Y-m-d');
        $this->groupe_id =  $this->groupeId;
        $this->groupes = DB::table("affectation")
            ->select("groupes.id as groupe_id", "groupe")
            ->join("groupes", "affectation.groupe_id", "groupes.id")
            ->where("utilisateur_id", "=", Auth::user()->id)
            ->get();
        $this->modules = Module::all();
        $this->salles = Salle::all();
        $this->types = Type::all();
        $this->etat_absences = DB::table("etat_absences")->get();
        $this->stagiaires = DB::table('stagiaires')
            ->join('groupes', 'stagiaires.groupe_id', '=', 'groupes.id')
            ->where('groupes.id', $this->groupeId ?? isset($this->groupes[0]) && $this->groupes[0]->groupe_id)
            ->select('stagiaires.*')
            ->get();
        return view('livewire.stagiaires');
    }
}
