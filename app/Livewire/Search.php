<?php

namespace App\Livewire;

use App\Models\Stagiaire;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $stagiaires = [];

    public function render()
    {
        if($this->search){
            $this->stagiaires = Stagiaire::where("nom", "like", "%".$this->search."%")->orWhere("prenom", "like", "%".$this->search."%")->get();
        }else{
            $this->stagiaires = [];
        }
        return view('livewire.search');
    }
}
