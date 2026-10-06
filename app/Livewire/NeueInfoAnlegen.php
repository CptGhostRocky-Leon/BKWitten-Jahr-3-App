<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Information;

#[Layout('components.layouts.app', ['title' => 'Neue Info anlegen'])]
class NeueInfoAnlegen extends Component
{
    use WithFileUploads;

    public string $titel = '';
    public string $nachricht = '';
    public $anhang = [];
    public ?string $erfolg = null;

    public function messages(): array
    {
        return [
            'titel.required' => 'Bitte gib einen Titel ein.',
            'nachricht.required' => 'Bitte gib eine Nachricht ein.',
            'anhang.array' => 'Die Anhänge sind ungültig.',
            'anhang.*.mimes' => 'Erlaubt sind nur PDF-, PNG- und JPG-Dateien.',
            'anhang.*.max' => 'Eine Datei darf maximal 5 MB groß sein.',
            'anhang.*.uploaded' => 'Die Datei konnte nicht hochgeladen werden. Sie ist evtl. zu groß.',
        ];
    }

    public function veroeffentlichen(): void
    {
        $this->erfolg = null;

        $this->validate([
            'titel' => 'required|string|max:255',
            'nachricht' => 'required|string',
            'anhang' => 'nullable|array',
            'anhang.*' => 'file|mimes:pdf,png,jpg|max:5120',
        ]);

        $info = Information::create([
            'titel' => $this->titel,
            'nachricht' => $this->nachricht,
            'status' => 'veroeffentlicht',
            'ist_wichtig' => false,
            'veroeffentlicht_am' => now(),
            'autor_id' => auth()->id(), // null, bis Login existiert
        ]);

        foreach ($this->anhang as $datei) {
            $info->anhaenge()->create([
                'dateiname' => $datei->getClientOriginalName(),
                'dateipfad' => $datei->store('anhaenge', 'public'),
                'dateityp' => $datei->getMimeType(),
            ]);
        }

        session()->flash('erfolg', 'Information wurde erfolgreich erstellt.');
        $this->redirectRoute('home', navigate: true);
    }

    public function render()
    {
        return view('livewire.neue-info-anlegen');
    }
}
