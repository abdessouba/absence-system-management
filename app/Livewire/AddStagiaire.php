<?php

namespace App\Livewire;

use App\Models\Groupe;
use App\Models\Stagiaire;
use Carbon\Carbon;
use Livewire\Component;

class AddStagiaire extends Component
{
    public $nom;
    public $prenom;
    public $adresse;
    public $ville;
    public $pays;
    public $tel;
    public $email;
    public $datenaissance;
    public $dateinscription;
    public $groupe_id;

    public $add = false;

    public $groupes;

    public function handleSubmit(){
        Stagiaire::create([
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "adresse" => $this->adresse,
            "pays" => $this->pays,
            "photo" => "default_image.png",
            "ville" => $this->ville,
            "tel" => $this->tel,
            "email" => $this->email,
            "datenaissance" => $this->datenaissance,
            "dateinscription" => $this->dateinscription,
            "groupe_id" => $this->groupe_id,
            
        ]);

        return redirect()->route("admin.stagiaires");
    }

    public function addStagiaire(){
        $this->add = true;
    }

    public function render()
    {
        $this->groupes = Groupe::all();
        $this->dateinscription = Carbon::today()->toDateString();
        return view('livewire.add-stagiaire');
    }
}
