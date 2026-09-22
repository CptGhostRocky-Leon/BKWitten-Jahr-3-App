# Atomic Design Leitfaden

Dieser Leitfaden beschreibt, wie wir das **Atomic Design Prinzip** (nach Brad Frost) in unserer Laravel- & Livewire-App umsetzen und erklärt unterschiede zwischen app/ und resources/.

---

## Technischer Unterschied: `app/` vs. `resources/views/`

In unserem Projekt begegnen dir drei ähnliche Ordner – hier ist der Unterschied:

### 1. `app/Livewire/` (Das Gehirn / PHP-Logik)
* Hier liegen die **PHP-Klassen** für interaktive Komponenten (z. B. `Counter.php`).
* Verwaltet Variablen (`$count`), berechnet Daten und führt Methoden aus.
* Läuft serverseitig in PHP.

### 2. `resources/views/livewire/` (Das Gesicht von Livewire)
* Das Blade-Template, das zu einer Livewire-Klasse gehört (z. B. `counter.blade.php`).
* Bestimmt das Aussehen und leitet Benutzerinteraktionen weiter (`wire:click="increment"`).

### 3. `resources/views/components/` (Reine Blade-Bausteine / Atome & Moleküle)
* Schablonen **ohne eigene PHP-Klasse** (z. B. `<x-atoms.button>`, `<x-atoms.badge>`, `<x-molecules.count-display>`).
* Rein für die Wiederverwendung von HTML & Tailwind-Styling.

---

## Die 5 Stufen in unserem Projekt

```text
Atome (Atoms)
  └── Moleküle (Molecules)
        └── Organismen (Organisms)
              └── Layouts / Templates
                    └── Seiten (Pages)
```

---

### 1. Atome (`resources/views/components/atoms/`)
Die kleinsten, nicht weiter teilbaren Grundbausteine der Oberfläche.

* **Was gehört dazu:** Buttons, Badges, Labels, Inputs, Icons.
* **Merkmal:** Haben keine eigene Geschäftslogik, sondern nur Styling und HTML-Attribute.
* **Beispiele:**
  * `<x-atoms.button>`: Universeller Button (`primary`, `secondary`, `danger`).
  * `<x-atoms.badge>`: Status-Chip (`Aktiv`, `Bereit`).

---

### 2. Moleküle (`resources/views/components/molecules/`)
Eine Kombination aus 2 oder mehr Atomen, die zusammen eine kleine, konkrete Einheit bilden.

* **Was gehört dazu:** Suchfeld (Input + Button), Formularfeld (Label + Input + Fehlermeldung), Button-Gruppen.
* **Beispiele:**
  * `<x-molecules.count-display>`: Die Zähleranzeige (Label + Zahl).
  * `<x-molecules.counter-controls>`: Bündelt die Button-Atome (`- 1`, `Zurücksetzen`, `+ 1`).

---

### 3. Organismen

In unserer Architektur unterscheiden wir zwei Arten von Organismen:

1. **Klassische Blade-Organismen (`resources/views/components/organisms/`):**
   * Größere, rein visuelle Bereiche, die keine Server-Reaktivität benötigen.
   * **Beispiel:** `<x-organisms.navbar>` (Header mit Logo und Badge).
2. **Interaktive Livewire-Organismen (`resources/views/livewire/` + `app/Livewire/`):**
   * Organismen mit Zustand (State) und Geschäftslogik, die per AJAX ohne Seiten-Reload reagieren.
   * **Beispiel:** `<livewire:counter />` (verwaltet den Zählerstand per PHP).

---

### 4. Layouts / Templates (`resources/views/components/layouts/`)
Das strukturelle Gerüst einer Seite (HTML-Kopf, Navbar-Organismus, Content-Platzhalter `{{ $slot }}`).

* **Beispiel:** `<x-layouts.app>`

---

### 5. Seiten (`resources/views/`)
Die fertige Ansicht, die der Nutzer im Browser aufruft.

* **Beispiel:** `welcome.blade.php` (bindet das Layout und die Organismen ein).

---

## Schnellübersicht für neue Komponenten

* **Einzelnes UI-Element?** $\rightarrow$ `components/atoms/`
* **Kleine Gruppe von Atomen?** $\rightarrow$ `components/molecules/`
* **Größerer visueller Bereich ohne Live-Logik?** $\rightarrow$ `components/organisms/`
* **Interaktiver Bereich mit PHP-Logik/Events?** $\rightarrow$ `app/Livewire/` + `resources/views/livewire/`

---

## 🤖 KI-Nutzung

Erstellt mit KI-Hilfe. Der Text wurde grob vorgeschrieben, durch eine KI erweitert und korrigiert. Anschließend wurden manuelle Anpassungen vorgenommen.