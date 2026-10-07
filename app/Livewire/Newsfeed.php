<?php

namespace App\Livewire;

use App\Models\Information;
use Livewire\Component;

class Newsfeed extends Component
{
    public array $ausgewaehlteKategorien = [];
    public $informationen = [];
    public function render()
    {
        $query = Information::query()
            ->orderByDesc('veroeffentlicht_am')
            ->with('anhaenge');

        if (!empty($this->ausgewaehlteKategorien)) {
            $query->whereIn('kategorie', $this->ausgewaehlteKategorien);
        }
        $this->informationen = $query->get();
        return view('livewire.newsfeed');
    }
}