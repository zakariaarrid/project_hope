<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use App\Models\Entreprise;

class EditContact extends Component
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

    public $typeSelection;

    protected $listeners = ['EditContact']; 
    
    protected $rules = [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'e_mail' => 'required|email',
        'nomEntreprise' => 'required|alpha_num',
        'code_postal' => 'required|integer',
    ];

    public function EditContact($display, $entreprise, $typeSelection)
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

        $this->typeSelection = $typeSelection;
       
        $this->display = true;
    }

    public function updateContact()
    {
        if($this->typeSelection == 'edit'){
            //update entreprise

            $entreprise = Entreprise::findOrFail($this->id_enteprise);

            $entreprise['adresse'] =  $this->adresse;

            $entreprise['code_postal'] =  $this->code_postal;

            $entreprise['ville'] =  $this->ville;

            $entreprise['adresse'] =  $this->adresse;

            $entreprise['statut'] =  $this->statut;

            $entreprise->save();

            //update contact

            $contact = Contact::where('entreprise_id','=', $this->id_enteprise)->first();

            $contact['nom'] = $this->nom;

            $contact['prenom'] = $this->prenom;

            $contact->save();
        }

         $this->display = false;
    }

    public function fermerPop()
    {
        $this->display = false;   
    }

    public function render()
    {
        return view('livewire.modal.edit-contact');
    }
}
