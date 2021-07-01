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
        'email' => 'required|email',
        'nomEntreprise' => 'required|regex:/^[\w-]*$/',
        'code_postal' => 'required|integer',
    ];

    public function EditContact($display, $entreprise, $typeSelection)
    { 
        $this->id_enteprise = $entreprise['id'];

        $this->nom = $entreprise['contactnom']; 

        $this->prenom = $entreprise['prenom'];  
        
        $this->email = $entreprise['e_mail'];  

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
            
            $this->validate();            

            $entreprise = Entreprise::findOrFail($this->id_enteprise)
            ->update(
                [
                    'adresse'=>$this->adresse,
                    'nom'=>ucwords($this->nomEntreprise),
                    'code_postal'=>$this->code_postal,
                    'ville'=>ucwords($this->ville),
                    'adresse'=>$this->adresse,
                    'statut'=>$this->statut,
                ]
            );    
            
            //update contact

            $contact = Contact::where('entreprise_id','=', $this->id_enteprise)->first()
            ->update(
                [
                'nom'=>ucwords($this->nom),
                'prenom'=>ucwords($this->prenom),
                'e_mail'=>strtolower($this->email),
                ]
            );        

            $this->emit('refreshtable');
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
