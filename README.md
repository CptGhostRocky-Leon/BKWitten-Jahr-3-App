# BKWitten Jahr 3 App

Dieses Dokument beschreibt die Git-Workflows, Branching-Konventionen und Commit-Richtlinien für unser Projekt.

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
