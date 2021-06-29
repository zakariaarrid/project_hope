<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewContact extends Component
{

    public $display = false;

    public $entreprise;

    public $nom;   

    public $prenom;

    public $email;

    public $nomEntreprise;

    public $code_postal;

    public $ville;

    public $adresse;

    public $statut;

    public $id_enteprise;

    protected $listeners = ['viewContact'];


    public function viewContact($entreprise)
    {

        $this->id_enteprise = $entreprise['id'];

        $this->nom = $entreprise['contact']['nom']; 

        $this->prenom = $entreprise['contact']['prenom'];  
        
        $this->email = $entreprise['contact']['e_mail'];  

        $this->nomEntreprise = $entreprise['nom']; 

        $this->code_postal = $entreprise['code_postal']; 

        $this->ville = $entreprise['ville']; 

        $this->adresse = $entreprise['adresse']; 

        $this->statut = $entreprise['statut']; 
       
        $this->display = true;

    }

    public function render()
    {
        return view('livewire.view-contact');
    }
}
