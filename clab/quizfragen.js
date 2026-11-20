document.addEventListener("DOMContentLoaded", () => {
    const container = document.querySelector(".lektionen-container");

    const fragen = [
        {
            text: "Wer darf sich im C-Lab aufhalten?",
            type: "radio",
            correct: [2],
            answers: [
                "Alle Studierenden der Hochschule",
                "Besuchende mit Interesse an Digital Media",
                "Nur Mitarbeiter, Professor:innen und Studierende des Studiengangs Digital Media",
                "Personen mit einer VR-Brille"
            ]
        },
        {
            text: "Was ist beim Auftreten eines Schadens zu tun?",
            type: "radio",
            correct: [1],
            answers: [
                "Den Schaden selbst reparieren",
                "Unverzüglich bei zuständigen Mitarbeiter:innen melden",
                "Den Schaden ignorieren",
                "In die nächste Vorlesung mitnehmen"
            ]
        },
        {
            text: "Was ist im Umgang mit dem Feuerlöscher zu beachten?",
            type: "checkbox",
            correct: [1, 2, 4],
            answers: [
                "Nur bei Rauchentwicklung benutzen",
                "Regelmäßig warten",
                "Nach Einsatz prüfen und ggf. auffüllen",
                "Immer bei lauten Geräuschen einsetzen",
                "Auf sichtbare Schäden und Druckstand achten"
            ]
        },
        {
            text: "Welche Aussagen zum Verhalten im Brandfall sind korrekt?",
            type: "checkbox",
            correct: [0, 2],
            answers: [
                "Fluchtwege freihalten",
                "Fenster öffnen",
                "Im Rauch am Boden bleiben",
                "Aufzug benutzen"
            ]
        },
        {
            text: "Was passiert beim Drücken des Hebels am Feuerlöscher?",
            type: "radio",
            correct: [1],
            answers: [
                "Das Feuer wird automatisch gelöscht",
                "Das Ventil öffnet sich und das Löschmittel strömt aus",
                "Der Feuerlöscher explodiert",
                "Der Feueralarm wird aktiviert"
            ]
        },
        {
            text: "Welche Löschtechniken gibt es?",
            type: "checkbox",
            correct: [0, 1, 2, 4],
            answers: [
                "Abdecken",
                "Kühlen",
                "Eindämmen",
                "Staubsaugen",
                "Sauerstoffentzug"
            ]
        },
        {
            text: "Welche Verhaltensregeln gelten für den Arbeitsplatz?",
            type: "checkbox",
            correct: [0, 3],
            answers: [
                "Nach der Arbeit aufräumen",
                "Getränke sind erlaubt",
                "Platz belegen erlaubt",
                "Essen ist nicht gestattet"
            ]
        },
        {
            text: "Was gilt für elektronische Geräte im C-Lab?",
            type: "checkbox",
            correct: [0, 2],
            answers: [
                "Konfiguration darf nicht geändert werden",
                "Eigene Programme sind erlaubt",
                "Keine Kabel umstecken",
                "Spiele installieren ist erlaubt"
            ]
        },
        {
            text: "Was ist bei der Schneidemaschine zu beachten?",
            type: "radio",
            correct: [1],
            answers: [
                "Überall nutzbar",
                "Nur auf der vorgesehenen Matte nutzen",
                "Ohne Einweisung benutzen",
                "Es besteht keine Verletzungsgefahr"
            ]
        },
        {
            text: "Wozu dienen die NOT-AUS-Schalter?",
            type: "radio",
            correct: [3],
            answers: [
                "Für Präsentationen",
                "Für den Aufzug",
                "Zum Ausschalten der VR-Geräte",
                "Zur Sicherheit im Notfall"
            ]
        },
        {
            text: "Was ist beim Drucker zu beachten?",
            type: "radio",
            correct: [0],
            answers: [
                "Nach Gebrauch ausschalten",
                "Dauerbetrieb ist Pflicht",
                "Privatdrucke sind erlaubt",
                "Nur Admin darf ihn nutzen"
            ]
        },
        {
            text: "Was sind typische Löschmittel?",
            type: "checkbox",
            correct: [0, 1, 2, 4],
            answers: [
                "Schaum",
                "CO₂",
                "Pulver",
                "Benzin",
                "Wasser"
            ]
        },
        {
            text: "Warum sollte man im Brandfall ruhig bleiben?",
            type: "radio",
            correct: [1],
            answers: [
                "Feuerlöscher sind gefährlich",
                "Nur dann handelt man richtig",
                "Sonst kommt die Feuerwehr nicht",
                "Andere mögen keine Panik"
            ]
        },
        {
            text: "Wer darf die VR-Geräte einschalten?",
            type: "radio",
            correct: [2],
            answers: [
                "Jeder mit VR-Erfahrung",
                "Jede Person im Labor",
                "Nur Fachpersonal oder Tutor:innen",
                "Niemand"
            ]
        },
        {
            text: "Was ist beim Standort eines Feuerlöschers zu beachten?",
            type: "checkbox",
            correct: [0, 3],
            answers: [
                "Gut sichtbar und leicht zugänglich",
                "Im Schrank verstecken",
                "Hinter Möbeln platzieren",
                "In der Nähe potenzieller Brandherde"
            ]
        }
    ];

    fragen.forEach((frage, index) => {
        const a = document.createElement("a");
        a.className = "lektion";
        a.id = `frage${index + 1}`;
        a.setAttribute("data-type", frage.type);
        a.setAttribute("data-correct", frage.correct.join(","));

        // Textbereich mit Frage + Antworten
        const textDiv = document.createElement("div");
        textDiv.className = "text";
        const h2 = document.createElement("h2");
        h2.textContent = `${index + 1}. Frage: ${frage.text}`;
        textDiv.appendChild(h2);

        const form = document.createElement("form");
        frage.answers.forEach((antwort, i) => {
            const label = document.createElement("label");
            const input = document.createElement("input");
            input.type = frage.type;
            input.name = `q${index + 1}`;
            input.value = i;
            label.appendChild(input);
            label.append(` ${antwort}`);
            form.appendChild(label);
        });

        textDiv.appendChild(form);

        a.appendChild(textDiv);

        container.appendChild(a);
    });
});
