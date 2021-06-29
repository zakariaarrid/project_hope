<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Entreprise;
use Livewire\WithPagination;

class TableContact extends Component
{
    use WithPagination;

    public $displayModal = false;

    public function editContact($entreprise, $typeSelection) 
    {
        $this->displayModal = true;

        $this->emit('EditContact', $this->displayModal, $entreprise, $typeSelection);
    }

    public function viewContact($entreprise)
    {
        $this->emit('viewContact', $entreprise);
    }

    public function render()
    {        
        return view('livewire.table-contact', [
            'entreprises' => Entreprise::with('contact')->Paginate(Entreprise::PAGINATION_COUNT)
        ]);
    }
}
