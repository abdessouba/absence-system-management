<?php

namespace App\Livewire;

use App\Models\Affectation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddGroupes extends Component
{
    public $secteurs;
    public $groupes;
    public $userId;
    public $add = false;

    public function addGroupes(){
        $this->add = !$this->add;
    }

    public function handleCheckbox($filiere_id, $groupe_id){
        $affectation = Affectation::where('utilisateur_id', $this->userId)
                          ->where('groupe_id', $groupe_id)
                          ->first();
        if(!$affectation){
           Affectation::create([
            "utilisateur_id" => $this->userId,
            "groupe_id" => $groupe_id
           ]);
        }else{
            $affectation->delete();
        }
    }

    public function done(){
        $this->js('window.location.reload()');
    }

    public function render()
    {
        return view('livewire.add-groupes');
    }
}
