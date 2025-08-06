<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter;


  public function increment()
    {
        $this->counter++;
    }

    public function descrement()
    {
        $this->counter--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
