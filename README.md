Dieses Dokument beschreibt das lokale Setup, die UI-Architektur und die Git-Richtlinien für unser Projekt.

---

## 🚀 Lokale Entwicklung (Schnellstart)

Voraussetzungen: **PHP >= 8.3**, **Composer** und **Node.js (>= 20)**.

### Einmalige Einrichtung nach dem Klonen:
```bash
# 1. Abhängigkeiten installieren
composer install
npm install

# 2. Umgebungskonfiguration anlegen & Key generieren
cp .env.example .env
php artisan key:generate

# 3. Lokale SQLite-Datenbank erstellen & migrieren
php artisan migrate

# 4. Frontend-Assets kompilieren
npm run build
```

### Entwicklungsserver starten:
```bash
composer run dev
```
> Die App ist anschließend unter **http://127.0.0.1:8000** erreichbar.

---

## 🎨 UI-Architektur (Atomic Design)

Wir strukturieren unsere Oberfläche nach **Atomic Design**:
* **Atome** (`resources/views/components/atoms/`): Buttons, Badges, Labels
* **Moleküle** (`resources/views/components/molecules/`): Button-Gruppen, Zähleranzeigen
* **Organismen** (`resources/views/components/organisms/` und `resources/views/livewire/`): Navbar, Livewire-Komponenten mit Geschäftslogik
* **Layouts** (`resources/views/components/layouts/`): HTML-Skelett der Anwendung
* **Seiten** (`resources/views/`): Konkrete Blade-Views

Ausführlicher Leitfaden mit Beispielen: [docs/ATOMIC_DESIGN.md](docs/ATOMIC_DESIGN.md)

---

## 📌 Repository- & Branch-Konzept

### 1. Persönliche Entwicklungs-Branches (Contributer-Branches)
Jeder Mitwirkende besitzt einen eigenen Hauptentwicklungs-Branch, um dort fortlaufend Änderungen vorzubereiten:
- Format: `<name>/development`
- Beispiele:
  - `leon/development`
  - `kim/development`

---

## 💡 Branching für Issues & Aufgaben

Wenn konkrete **Issues / Aufgaben** bearbeitet werden, wird immer ein eigener Issue-Branch vom aktuellen Stand erstellt.

### Namenskonvention:
```text
<typ>/#<issue-id>-<beschreibung>
```

#### Erlaubte Typen:
- `feat/`: Neue Features oder Funktionen
- `fix/`: Fehlerbehebungen (Bugfixes)
- `refactor/`: Code-Überarbeitungen ohne Funktionsänderung
- `docs/`: Dokumentationsanpassungen
- `style/`: Formatierungen, Styling, UI-Anpassungen
- `test/`: Hinzufügen oder Anpassen von Tests
- `chore/`: Wartungsaufgaben, Abhängigkeiten aktualisieren

#### Beispiele:
- `feat/#12-login-screen`
- `fix/#45-api-timeout`
- `refactor/#19-user-service`
- `docs/#3-update-readme`

---

## 📝 Commit-Konventionen (Conventional Commits)

Alle Commit-Nachrichten sollen nach dem Standard von [Conventional Commits v1.0.0](https://www.conventionalcommits.org/en/v1.0.0/) aufgebaut sein:

```text
<typ>[optionaler scope]: <beschreibung>

[optionaler body]

[optionales footer(s)]
```

### Typische Typen & Beispiele:
- `feat: login maske hinzugefügt (#12)`
- `fix(auth): fehlerhafte token-validierung behoben (#45)`
- `docs: readme um conventional commits ergänzt`
- `refactor: user-service modularisiert`
- `style: dateiformatierung nach linter angepasst`
- `test: unit tests für login controller hinzugefügt`
- `chore: abhängigkeiten aktualisiert`

> **Tipp:** Wenn der Commit eine Aufgabe/ein Issue abschließt, kann im Footer oder in der Kurzbeschreibung die Issue-Nummer referenziert werden (z. B. `Closes #12`).

---

## 🔄 Typischer Git-Workflow

1. **Neuen Issue-Branch erstellen** (vom aktuellen Hauptstand abzweigen):
   ```bash
   git checkout main
   git pull
   git checkout -b feat/#12-login-screen
   ```

2. **Änderungen vornehmen & committen** (nach Conventional Commits):
   ```bash
   git add .
   git commit -m "feat(auth): login maske hinzugefügt (#12)"
   ```

3. **Branch auf GitHub pushen**:
   ```bash
   git push -u origin feat/#12-login-screen
   ```

4. **Pull Request (PR) erstellen**:
   - Pull Request gegen `main` (bzw. den Zielführenden Branch) stellen.
   - Nach erfolgreichem Review und Merge den Branch lokal und remote löschen:
     ```bash
     git checkout main
     git pull
     git branch -d feat/#12-login-screen
     git push origin --delete feat/#12-login-screen
     ```

---

## 🔄 KI-Nutzung

Erstellt mit KI-Hilfe. Der Text wurde grob vorgeschrieben, durch eine KI erweitert und korrigiert. Anschließend wurden manuelle Anpassungen vorgenommen.