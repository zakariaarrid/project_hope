<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use App\Models\Entreprise;

class DeleteContact extends Component
{

    public $id_entreprise;

    public $displayModal = false;

    protected $listeners = ['deleteEntreprise']; 

    public function deleteEntreprise($id)
    {
       $this->id_entreprise = $id;
 
       $this->displayModal = true;
       
    }

    public function supprimerContact() 
    {
        Contact::where('entreprise_id','=', $this->id_entreprise)->delete();
        Entreprise::findOrFail($this->id_entreprise)->delete();
        $this->emit('refreshtable');
        $this->displayModal = false;

    }

    public function render()
    {
        return view('livewire.delete-contact');
    }
}
