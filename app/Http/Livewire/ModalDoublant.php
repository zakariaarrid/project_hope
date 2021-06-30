<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalDoublant extends Component
{

    public $msg;

    public $displayModal = false;

    protected $listeners = ['ModalDoublant'];

    public function ModalDoublant($msg)
    {
       $this->msg = $msg;

       $this->displayModal = true;
    }

    public function ConfirmerContact()
    {
      $this->emit('ConfirmerContact');

      $this->displayModal = false;

    }

    public function CloseconfirmerContact()
    {
      $this->displayModal = false;
    }

    public function render()
    {
        return view('livewire.modal-doublant');
    }
}
