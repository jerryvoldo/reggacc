<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Daftarplant extends Component
{
    public $daftarplant;

    protected $listeners = ['tambahplant' => 'updatedaftarplant'];

    public function render()
    {
        return view('livewire.daftarplant');
    }

    public function updatedaftarplant($data)
    {
        $this->daftarplant[] = $data;     
    }
}
