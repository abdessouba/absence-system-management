<?php

namespace App\Livewire;

use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddUtilisateur extends Component
{
    public $add = false;

    public $nom;
    public $prenom;
    public $adresse;
    public $ville;
    public $email;
    public $password;
    public $image = "defaultFormateur.png";
    public $isAdmin = false;

    public function addUtilisateur(){
        $this->add = !$this->add;
    }
    public function handleFormSubmit(){
        Utilisateur::create([
            "nom" =>$this->nom,
            "prenom" =>$this->prenom,
            "email" =>$this->email,
            "password" =>Hash::make($this->password),
            "adresse" =>$this->adresse,
            "ville" =>$this->ville,
            "image" =>$this->image,
            "isAdmin" =>$this->isAdmin
        ]);
        return redirect()->route("admin.formateur");
    }
    public function render()
    {
        return view('livewire.add-utilisateur');
    }
}
