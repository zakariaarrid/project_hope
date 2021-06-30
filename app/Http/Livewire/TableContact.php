<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Entreprise;
use Livewire\WithPagination;

class TableContact extends Component
{
    use WithPagination;

    public $displayModal = false;  
    
    public $sortField = 'contactnom';

	public $order = 'desc';

    public $search = '';
    
    protected $listeners = ['refreshtable'=>'$refresh'];

    public function sortBy($field, $order)
	{
		$this->order = $order;

		$this->sortField = $field;
	}

    public function editContact($entreprise, $typeSelection) 
    {
        $this->displayModal = true;

        $this->emit('EditContact', $this->displayModal, $entreprise, $typeSelection);
    }

    public function viewContact($entreprise)
    {
        $this->emit('viewContact', $entreprise);
    }

    public function deleteEntreprise($id)
    {
        $this->emit('deleteEntreprise', $id);
    }

    public function AddContact(){
        $this->emit('AddContact');
    }

    public function render()
    {        
        return view('livewire.table-contact', [
            'entreprises' => Entreprise::search($this->search, $this->sortField, $this->order)  
            ->Paginate(Entreprise::PAGINATION_COUNT)
        ]);
    }
}
