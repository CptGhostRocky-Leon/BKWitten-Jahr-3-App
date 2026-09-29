<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Information;

class NeueInfoAnlegen extends Component
{
    use WithFileUploads;

    public string $titel = '';
    public string $nachricht = '';
    public $anhang;

    public function veroeffentlichen(): void
    {
        $this->validate([
            'titel' => 'required|string|max:255',
            'nachricht' => 'required|string',
            'anhang' => 'nullable|file|mimes:pdf,png,jpg|max:5120',
        ]);

        if ($this->anhang) {
            $pfad = $this->anhang->store('anhaenge', 'public');
            // TODO: $pfad in Anhang-Tabelle speichern, sobald diese existiert
        }

        Information::create([
            'titel' => $this->titel,
            'nachricht' => $this->nachricht,
            'status' => 'veroeffentlicht',
            'ist_wichtig' => false,
            'veroeffentlicht_am' => now(),
            'autor_id' => auth()->id(), // null, bis Login existiert
        ]);

        $this->reset(['titel', 'nachricht', 'anhang']);
        session()->flash('erfolg', 'Info wurde veröffentlicht.');
    }

    public function render()
    {
        return view('livewire.neue-info-anlegen');
    }
}
