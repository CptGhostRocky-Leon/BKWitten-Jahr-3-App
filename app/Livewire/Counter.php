<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    // Öffentliche Variable für das Frontend
    public int $count = 0;

    public function increment(): void
    {
        $this->count++;
    }

    public function decrement(): void
    {
        // Nicht unter 0 zählen
        if ($this->count > 0) {
            $this->count--;
        }
    }

    public function resetCount(): void
    {
        $this->count = 0;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}

