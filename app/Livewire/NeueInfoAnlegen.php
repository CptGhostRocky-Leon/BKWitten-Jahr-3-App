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
    public ?string $erfolg = null;

    public function veroeffentlichen(): void
    {
        $this->erfolg = null;

        $this->validate([
            'titel' => 'required|string|max:255',
            'nachricht' => 'required|string',
            'anhang' => 'nullable|file|mimes:pdf,png,jpg,jpeg|max:5120',
        ]);

        $info = Information::create([
            'titel' => $this->titel,
            'nachricht' => $this->nachricht,
            'status' => 'veroeffentlicht',
            'ist_wichtig' => false,
            'veroeffentlicht_am' => now(),
            'autor_id' => auth()->id(), // null, bis Login existiert
        ]);

        if ($this->anhang) {
            $dateiname = $this->anhang->getClientOriginalName();
            $dateityp = $this->anhang->getMimeType();
            $pfad = $this->anhang->store('anhaenge', 'public');

            $info->anhaenge()->create([
                'dateiname' => $dateiname,
                'dateipfad' => $pfad,
                'dateityp' => $dateityp,
            ]);
        }

        $this->reset(['titel', 'nachricht', 'anhang']);
        $this->erfolg = 'Information wurde erfolgreich erstellt.';
    }

    public function render()
    {
        return view('livewire.neue-info-anlegen');
    }
}
