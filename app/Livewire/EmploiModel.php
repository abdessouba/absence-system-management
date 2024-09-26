<?php

namespace App\Livewire;

use App\Models\Emploi;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Livewire;

class EmploiModel extends Component
{
    public $emplois = [];
    public $jours = [];
    public $modules = [];
    public $salles = [];
    public $types = [];


    public $heure_debut = "08:30:00";
    public $heure_fin = "13:30:00";
    public $module_id;
    public $type_id;
    public $jourId;

    public $edit_id;

    public function editId($id)
    {
        $this->edit_id = $id;
    }

    // protected $listeners = ['dataReceived'];
    #[On('dataReceived')]
    public function dataReceived($data = null)
    {
        if ($data) {
            $selectedEmploi = Emploi::find($this->edit_id);
            $selectedEmploi->update([
                "salles_id" => $data["salle_id"],
                "formateurs_id" => 1, // formateur is authentificated
                "groupe_id" => $data["groupe_id"],
                "temporaire" => null,
                "jours_id" => $data["jour_id"],
                "heure_debut" => $data["heure_debut"],
                "heure_fin" => $data["heure_fin"],
                "types_id" => $data["type_id"],
            ]);
            $this->dispatch("refresh");
            return back();
        }
    }


    public function render()
    {
        $this->jours = DB::table("jours")->get();
        $this->modules = DB::table("modules")->get();
        $this->salles = DB::table("salles")->get();
        $this->types = DB::table("types")->get();

        return view('livewire.emploi-model');
    }
}
