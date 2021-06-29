<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Entreprise;
use Livewire\WithPagination;

class TableContact extends Component
{
    use WithPagination;

    public $displayModal = false;

    public function editContact($id) 
    {
        $this->displayModal = true;

        $this->emit('EditContact', $this->displayModal);
    }

    public function render()
    {        
        return view('livewire.table-contact', [
            'entreprises' => Entreprise::with('contact')->Paginate(Entreprise::PAGINATION_COUNT)
        ]);
    }
}
