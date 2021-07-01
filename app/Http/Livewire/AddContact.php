<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Contact;
use Livewire\Component;
use App\Models\Entreprise;

class AddContact extends Component
{
    public $display = false;

    public $entreprise;

    public $nom;   

    public $prenom;

    public $e_mail;

    public $nomEntreprise;

    public $code_postal;

    public $ville;

    public $adresse;

    public $statut;

    public $id_enteprise;

    public $typeSelection;

    protected $listeners = ['AddContact','ConfirmerContact']; 
    
    protected $rules = [
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'e_mail' => 'required|email',
        'adresse' => 'required',
        'nomEntreprise' => 'required|regex:/^[\w-]*$/',
        'code_postal' => 'required|integer',
    ];

    public function AddContact()
    {              
        $this->display = true;
    }

    public function createContact()
    {    
        $contact = Contact::where('nom','=', $this->nom)->where('prenom','=', $this->prenom)->first();   
        
        $entreprise = Entreprise::where('nom','=', $this->nomEntreprise)->first();
       
        if($contact !== null)
        {
          $this->emit('ModalDoublant', 'Un contact existe déjà avec le même prénom et le même nom.');
                      
        }elseif($entreprise !== null)
        {
          $this->emit('ModalDoublant', 'Nom entreprise existe déjà .');
           
        }elseif($entreprise === null && $contact === null)
        {
          
          $this->__saveContact();  

          $this->display = false;         
        }        

        $this->display = false; 
        
    }

    public function ConfirmerContact()
    {
        $this->__saveContact();

        $this->display = false;
    }
   

    public function fermerPop()
    {
        $this->display = false;   
    }

    public function render()
    {
        return view('livewire.add-contact');
    }

    public function __saveContact() 
    {
        $this->validate();

        $entreprise = new Entreprise();

        $entreprise['adresse'] =  $this->adresse;

        $entreprise['code_postal'] =  $this->code_postal;

        $entreprise['ville'] =  ucwords($this->ville);

        $entreprise['nom'] =  ucwords($this->nomEntreprise);        

        $entreprise['adresse'] =  $this->adresse;

        $entreprise['statut'] =  $this->statut;

        $entreprise['cle'] = Carbon::now()->timestamp;

        $entreprise->save();    

        $contact = new Contact();

        $contact['nom'] = ucwords($this->nom);

        $contact['e_mail'] = strtolower($this->e_mail);

        $contact['prenom'] = ucwords($this->prenom);

        $contact['telephone_mobile'] = '+000000000';

        $contact['telephone_fixe'] = '+000000000';        

        $contact['entreprise_id'] = $entreprise->id;

        $contact['cle'] = Carbon::now()->timestamp;

        $contact->save();

        $this->__resetForm();

        $this->emit('refreshtable');
    }

    private function __resetForm()
    {
        $this->entreprise= '';

        $this->nom= '';   

        $this->prenom= '';

        $this->e_mail= '';

        $this->nomEntreprise= '';

        $this->code_postal= '';

        $this->ville= '';

        $this->adresse= '';

        $this->statut= '';

    }
}
