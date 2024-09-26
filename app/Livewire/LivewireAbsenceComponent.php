<?php

namespace App\Livewire;

use App\Models\Absence;
use Livewire\Component;

class LivewireAbsenceComponent extends Component
{
    public $value = null;
    public $key = null;
    public $seanceId;
    public $edit = [];
    public $absence = 1;

    public function editStagiaire($id, $value){

        if($id){
            $this->edit[$id] = $value;
        }
    }

    public function deleteStagiaireAbsence($absenceStagiaireId, $formSeanceId){
        $absenceOfStagiaire = Absence::where("seance_id", $formSeanceId)->where("stagiaire_id", $absenceStagiaireId)->first();
        $absenceOfStagiaire->delete();
        return redirect()->to('/seances');
    }

    public function saveAbsence($absenceStagiaireId, $formSeanceId){
        $absenceOfStagiaire = Absence::where("seance_id", $formSeanceId)->where("stagiaire_id", $absenceStagiaireId)->first();
        if($absenceOfStagiaire){
            $absenceOfStagiaire->update([
                "etat_absence_id" => $this->absence
            ]);
            return redirect()->to('/seances');
        }
    }

    public function handleEditStudent($absenceStagiaireId, $formSeanceId){
        $this->dispatch("handleStagiaireAbsenceUpdate", ["absenceStagiaireId" => $absenceStagiaireId, "formSeanceId" => $formSeanceId]);
    }

    public function render()
    {
        return view('livewire.livewire-absence-component');
    }
}
