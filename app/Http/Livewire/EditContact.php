<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditContact extends Component
{
    public $display = false;

    protected $listeners = ['EditContact'];

    public function EditContact($display)
    {
        $this->display = true;
    }

    public function render()
    {
        return view('livewire.modal.edit-contact');
    }
}
