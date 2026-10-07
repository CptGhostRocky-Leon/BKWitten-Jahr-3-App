<?php

return [

    'sections' => [

        'unterrichtszeiten' => [
            'title' => 'Unterrichtszeiten',
            'description' => 'Hier findest du die Unterrichtszeiten des Berufskollegs Witten für Montag bis Freitag sowie für Samstag. Zusätzlich sind die Zeiten des Abendunterrichts aufgeführt.',
            'image' => null,
            'content' => [
                [
                    'blocks' => [
                            [
                            'type' => 'table',
                            'title' => 'Unterricht',
                            'headers' => [
                                'Stunde',
                                'Montag–Freitag',
                                'Samstag',
                            ],
                            'rows' => [
                                ['1. Stunde', '07:40 – 08:25 Uhr', '07:45 – 08:40 Uhr'],
                                ['2. Stunde', '08:25 – 09:10 Uhr', '08:40 – 09:35 Uhr'],

                                ['type' => 'pause'],

                                ['3. Stunde', '09:30 – 10:15 Uhr', '09:55 – 10:50 Uhr'],
                                ['4. Stunde', '10:15 – 11:00 Uhr', '10:50 – 11:45 Uhr'],

                                ['type' => 'pause'],

                                ['5. Stunde', '11:15 – 12:00 Uhr', '–'],
                                ['6. Stunde', '12:00 – 12:45 Uhr', '–'],

                                ['type' => 'pause'],

                                ['7. Stunde', '13:00 – 13:45 Uhr', '–'],
                                ['8. Stunde', '13:45 – 14:30 Uhr', '–'],

                                ['type' => 'pause'],

                                ['9. Stunde', '14:45 – 15:30 Uhr', '–'],
                                ['10. Stunde', '15:30 – 16:15 Uhr', '–'],

                                ['type' => 'pause'],

                                ['11. Stunde', '16:30 – 17:15 Uhr', '–'],
                                ['12. Stunde', '17:15 – 18:00 Uhr', '–'],
                            ],
                        ],

                        [
                            'type' => 'table',
                            'title' => 'Abendunterricht',
                            'headers' => [
                                'Stunde',
                                'Montag–Freitag',
                                'Samstag',
                            ],
                            'rows' => [
                                ['13. Stunde', '17:30 – 18:15 Uhr', '–'],

                                ['type' => 'pause'],

                                ['14. Stunde', '18:30 – 19:15 Uhr', '–'],
                                ['15. Stunde', '19:15 – 20:00 Uhr', '–'],

                                ['type' => 'pause'],

                                ['16. Stunde', '20:15 – 21:00 Uhr', '–'],
                                ['17. Stunde', '21:00 – 21:45 Uhr', '–'],
                            ],
                        ],
                    ],
                ],
            ],
        ],

        'ferienzeiten' => [
            'title' => 'Ferienzeiten',
            'description' => 'Hier findest du die Ferientermine des Landes Nordrhein-Westfalen sowie die beweglichen Ferientage des Berufskollegs Witten.',
            'image' => null,
            'content' => [
                [
                    'title' => 'Ferientermine des Landes NRW',
                    'blocks' => [
                        [
                            'type' => 'table',
                            'groupedHeaders' => [
                                ['text' => 'Ferien', 'rowspan' => 2],
                                ['text' => '2025/2026', 'colspan' => 2],
                                ['text' => '2026/2027', 'colspan' => 2],
                            ],
                            'subHeaders' => [
                                'Von',
                                'Bis',
                                'Von',
                                'Bis',
                            ],
                            'rows' => [
                                ['Sommerferien', '14.07.2025', '26.08.2025', '20.07.2026', '01.09.2026'],
                                ['Herbstferien', '13.10.2025', '25.10.2025', '19.10.2026', '30.10.2026'],
                                ['Winterferien', '22.12.2025', '06.01.2026', '23.12.2026', '06.01.2027'],
                                ['Osterferien', '30.03.2026', '11.04.2026', '22.03.2027', '03.04.2027'],
                                ['Pfingsten', '26.05.2026', '–', '18.05.2027', '–'],
                                ['Sommerferien', '20.07.2026', '01.09.2026', '19.07.2027', '31.08.2027'],
                            ],
                        ],
                    ],
                ],

                [
                    'title' => 'Bewegliche Ferientage',
                    'blocks' => [
                        [
                            'type' => 'table',
                            'headers' => [
                                'Schuljahr',
                                'Datum',
                                'Anlass',
                            ],
                            'rows' => [
                                ['2025/2026', '16.02.2026', 'Rosenmontag'],
                                ['2025/2026', '15.05.2026', 'Freitag nach Christi Himmelfahrt'],
                                ['2025/2026', '05.06.2026', 'Freitag nach Fronleichnam'],
                                ['2026/2027', '08.02.2027', 'Rosenmontag'],
                                ['2026/2027', '07.05.2027', 'Freitag nach Christi Himmelfahrt'],
                                ['2026/2027', '28.05.2027', 'Freitag nach Fronleichnam'],
                            ],
                        ],
                    ],
                ],
            ],
        ],

        'blockzeiten' => [
            'title' => 'Blockzeiten',
            'description' => 'Hier findest du die Blockunterrichtszeiten für die Bildungsgänge Bankkaufleute, Industriekaufleute und IT-Berufe.',
            'image' => null,
            'content' => [
                [
                    'title' => 'Bankkaufleute',
                    'blocks' => [
                        [
                            'type' => 'table',
                            'groupedHeaders' => [
                                ['text' => 'Stufe', 'rowspan' => 2],
                                ['text' => '2025/2026', 'colspan' => 2],
                                ['text' => '2026/2027', 'colspan' => 2],
                            ],
                            'subHeaders' => [
                                'Von',
                                'Bis',
                                'Von',
                                'Bis',
                            ],
                            'rows' => [
                                ['Oberstufe', '22.08.2025', '17.11.2025', '03.09.2026', '26.11.2026'],
                                ['Mittelstufe', '28.11.2025', '20.03.2025', '27.11.2026', '19.03.2027'],
                                ['Unterstufe', '23.03.2026', '10.07.2026', '05.04.2027', '02.07.2027'],
                            ],
                        ],
                    ],
                ],

                [
                    'title' => 'Industriekaufleute',
                    'blocks' => [
                        [
                            'type' => 'table',
                            'groupedHeaders' => [
                                ['text' => 'Stufe', 'rowspan' => 2],
                                ['text' => '2025/2026', 'colspan' => 2],
                                ['text' => '2026/2027', 'colspan' => 2],
                            ],
                            'subHeaders' => [
                                'Von',
                                'Bis',
                                'Von',
                                'Bis',
                            ],
                            'rows' => [
                                ['Oberstufe', '28.08.2025', '10.10.2025', '03.09.2026', '16.10.2026'],
                                ['Oberstufe', '23.02.2026', '17.04.2026', '22.02.2027', '16.04.2027'],
                                ['Mittelstufe', '08.12.2025', '20.02.2026', '07.12.2026', '19.02.2027'],
                                ['Mittelstufe', '15.06.2026', '17.07.2026', '21.06.2027', '16.07.2027'],
                                ['Unterstufe', '27.10.2025', '05.12.2025', '02.11.2026', '04.12.2026'],
                                ['Unterstufe', '20.04.2026', '12.06.2026', '19.04.2027', '18.06.2027'],
                            ],
                        ],
                    ],
                ],

                [
                    'title' => 'IT-Berufe',
                    'blocks' => [
                        [
                            'type' => 'table',
                            'groupedHeaders' => [
                                ['text' => 'Stufe', 'rowspan' => 2],
                                ['text' => '2025/2026', 'colspan' => 2],
                                ['text' => '2026/2027', 'colspan' => 2],
                            ],
                            'subHeaders' => [
                                'Von',
                                'Bis',
                                'Von',
                                'Bis',
                            ],
                            'rows' => [
                                ['Oberstufe', '28.08.2025', '10.10.2025', '03.09.2026', '16.10.2026'],
                                ['Oberstufe', '19.02.2026', '27.03.2026', '08.02.2027', '19.03.2027'],
                                ['Mittelstufe', '27.10.2025', '19.12.2025', '02.11.2026', '11.12.2026'],
                                ['Mittelstufe', '13.04.2026', '22.05.2026', '05.04.2027', '14.05.2027'],
                                ['Unterstufe', '07.01.2026', '13.02.2026', '14.12.2026', '05.02.2027'],
                                ['Unterstufe', '27.05.2026', '17.07.2026', '19.05.2027', '16.07.2027'],
                            ],
                        ],
                    ],
                ],
            ],
        ],

        'gebaeudeplan' => [
            'title' => 'Gebäudeplan',
            'description' => 'Hier findest du eine Übersicht über die Gebäude und Räume des Berufskollegs Witten.',
            'image' => 'images/faq/schulgebaeude.webp',
            'content' => [
                
            ],
        ],

        'lerncoaching' => [
            'title' => 'Lerncoaching',
            'description' => 'Mehr Klarheit. Mehr Plan. Mehr Du.',
            'image' => null,
            'content' => [
                [
                    'blocks' => [

                        [
                            'type' => 'text',
                            'text' => 'Du willst dein Lernen verbessern? Dann bist du bei uns genau richtig.',
                        ],

                        [
                            'type' => 'heading',
                            'text' => 'Im Lerncoaching …',
                        ],

                        [
                            'type' => 'list',
                            'items' => [
                                'analysieren wir gemeinsam deine aktuelle Lernsituation',
                                'entwickeln passende Lernstrategien',
                                'arbeiten an Motivation und Selbstorganisation',
                                'stärken dein Selbstvertrauen',
                            ],
                        ],

                        [
                            'type' => 'text',
                            'text' => 'Das Coaching ist freiwillig, vertraulich und auf deine persönlichen Ziele abgestimmt.',
                        ],

                        [
                            'type' => 'button',
                            'text' => 'Jetzt Termin buchen',
                            'url' => 'https://bookings.cloud.microsoft/book/Lerncoaching1@bkwitten.net/?ismsaljsauthenabled',
                        ],

                        [
                            'type' => 'text',
                            'text' => 'Du hast Fragen? Dann nimm direkt Kontakt mit uns auf und sende uns eine E-Mail an:',
                        ],

                        [
                            'type' => 'email',
                            'email' => 'lerncoaching@bkwitten.net',
                        ],

                    ],
                ],
            ],
        ],

        'hilfsangebote' => [
            'title' => 'Hilfsangebote',
            'description' => 'Hier findest du verschiedene Beratungs- und Unterstützungsangebote des Berufskollegs Witten und weiterer Einrichtungen.',
            'image' => null,
            'content' => [

                [
                    'title' => 'Schulsozialarbeit',
                    'blocks' => [
                        [
                            'type' => 'text',
                            'text' => 'Wir bieten allen Schülerinnen und Schülern unserer Schule, die sich in schulischen, privaten oder betrieblichen Problemlagen befinden, Unterstützung und Beratung an.',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Das Angebot der Schulsozialarbeit ist freiwillig und kostenlos. Die Inhalte der Gespräche werden vertraulich behandelt und werden ohne Einverständnis nicht an Dritte weitergegeben.',
                        ],
                        [
                            'type' => 'heading',
                            'text' => 'Wir sind Ansprechpartner bei',
                        ],
                        [
                            'type' => 'list',
                            'items' => [
                                'schulischen Problemen',
                                'privaten Problemen',
                                'Problemen im Ausbildungsbetrieb',
                                'Konflikten',
                                'Mobbing',
                                'Drogenproblemen',
                                'Schulden',
                                'anderen persönlichen Schwierigkeiten',
                            ],
                        ],
                        [
                            'type' => 'heading',
                            'text' => 'Wir bieten',
                        ],
                        [
                            'type' => 'list',
                            'items' => [
                                'vertrauliche Beratung',
                                'Unterstützung bei persönlichen, schulischen und betrieblichen Problemen',
                                'gemeinsame Suche nach Lösungen',
                                'Vermittlung weiterer Hilfsangebote',
                            ],
                        ],
                        [
                            'type' => 'heading',
                            'text' => 'Erreichbarkeit',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Für Terminabsprachen sind wir von Montag bis Freitag grundsätzlich in den Pausen oder nach Absprache mit den Lehrkräften auch während des Unterrichts erreichbar.',
                        ],
                        [
                            'type' => 'person',
                            'name' => 'Sven Hofmann',
                            'room' => 'B006',
                            'phone' => '02302 920134',
                            'mobile' => '0177 8636820',
                            'email' => 's.hofmann@bkwitten.net',
                            'focus' => 'Technik und internationale Förderklassen',
                        ],
                        [
                            'type' => 'person',
                            'name' => 'Susanne Kahle',
                            'room' => 'B005',
                            'phone' => '02302 920169',
                            'mobile' => '0177 8636379',
                            'email' => 's.kahle@bkwitten.net',
                            'focus' => 'Gesundheit und Soziales',
                        ],
                        [
                            'type' => 'person',
                            'name' => 'Marcel Stinner',
                            'room' => 'B007',
                            'phone' => '02302 920155',
                            'mobile' => '0177 8636571',
                            'email' => 'm.stinner@bkwitten.net',
                            'focus' => 'IFK und FFM, BFS 1 & 2G',
                        ],
                        [
                            'type' => 'person',
                            'name' => 'Laura Drossel',
                            'room' => 'B007',
                            'phone' => '02302 920109',
                            'mobile' => '0157 74013709',
                            'email' => 'l.drossel@bkwitten.net',
                            'focus' => 'Wirtschaft und Verwaltung',
                        ],
                    ],
                ],

                [
                    'title' => 'Ausbildungsbegleitende Hilfen',
                    'blocks' => [
                        [
                            'type' => 'heading',
                            'text' => 'Schwierigkeiten in der Berufsausbildung?',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Ihr Ziel ist der erfolgreiche Abschluss Ihrer Ausbildung, aber schlechte Noten oder andere Hindernisse stehen Ihrem Ziel im Weg?',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Sie benötigen Unterstützung?',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Die Maßnahme der „ausbildungsbegleitenden Hilfen“ (abH) ist zum 31.08.2021 bundesweit ausgelaufen. Das Nachfolgeprojekt Assistierte Ausbildung flexibel, kurz AsAflex begann am 01.09.2021 und kann weiterhin von Auszubildenden genutzt werden.',
                        ],
                        [
                            'type' => 'text_with_link',
                            'text_before' => 'Informationen zu diesem neuen Projekt der Agentur für Arbeit finden sie ',
                            'link_text' => 'hier',
                            'url' => 'https://www.bkwitten.net/wp-content/uploads/2021/09/Flyer-AsAflex-TN.pdf',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Haben Sie in mind. zwei Fächern aktuell die Note vier? Oder in einem Fach sogar die Note fünf? Besteht die Gefahr, dass Sie Ihre Ausbildung nicht erfolgreich abschließen können? Dann melden Sie sich für die Vereinbarung eines Erstgesprächs gerne telefonisch bei:',
                        ],
                        [
                            'type' => 'person',
                            'name' => 'Frau Weber',
                            'phone' => '02302 58186 93',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'beide Mitarbeiterinnen erreichen sie per E-Mail unter der folgenden Adresse:',
                        ],
                        [
                            'type' => 'email',
                            'email' => 'AsAflex@vhs-wwh.de',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'oder bei',
                        ],
                        [
                            'type' => 'person',
                            'name' => 'Virginie Demtröder',
                            'phone' => '02302 58186 77',
                        ],
                        [
                            'type' => 'email',
                            'email' => 'AsAflex@vhs-wwh.de',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'In diesem unverbindlichen Gespräch können wir besprechen was für Chancen und Möglichkeiten wir Ihnen bieten können, aber auch welche Pflichten auf Sie zukommen. Zum Erstgespräch sollten Sie bitte bereits folgende Unterlagen mitbringen:',
                        ],
                        [
                            'type' => 'list',
                            'items' => [
                                'Ausbildungsvertrag',
                                'Eintragungsvermerk der Kammer',
                                'Lebenslauf',
                                'Schulabschlusszeugnis',
                                'alle Berufsschulzeugnisse',
                                'Sozialversicherungsnummer',
                            ],
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Die Nachhilfe findet in den Räumen der vhs, der Volkshochschule Witten | Wetter | Herdecke in Witten Annen, Holzkampstr. 7 in 58453 Witten statt.',
                        ],
                    ],
                ],

                [
                    'title' => 'Schüler helfen Schülern',
                    'blocks' => [
                        [
                            'type' => 'heading',
                            'text' => 'Schüler helfen Schülern – Was steckt dahinter?',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Aus der SV-Arbeit ist die Idee entstanden, das große Potentail unserer Schülerinnen und Schüler zu nutzen, um gegenseitige Hilfen zu organisieren. Ob z.B. Mathematik, Erziehungswissenschaften oder Betriebswirtschaftslehre.',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Schülerinnen und Schüler helfen sich gegenseitig in Lerngruppen oder bieten Nachhilfe in bestimmten Fächern für einen oder mehrere Schüler an.',
                        ],
                        [
                            'type' => 'heading',
                            'text' => 'Wie finde ich Hilfe?',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Du suchst eine Schülerin/einen Schüler, die/der dir Nachhilfe erteilt, so wende dich an einen unserer SV-Lehrer. In unserer Info-Vitrine in unserer Eingangshalle kann man sich zusätzlich über Angebote informieren.',
                        ],
                        [
                            'type' => 'link',
                            'text' => 'SV-Lehrer',
                            'url' => 'https://www.bkwitten.net/fur-unsere-schulerinnen/beratung/sv-lehrer/',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Für eine gegenseitige Unterstützung in Lerngruppen (z.B. vor Klassenarbeiten) organsiert ihr euch selbständig.',
                        ],
                        [
                            'type' => 'heading',
                            'text' => 'Wie biete ich Hilfe an?',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Auch hier gilt wieder: Wende dich an einen unserer SV-Lehrer oder hänge dein Angebot an unser Schwarzes Brett.',
                        ],
                        [
                            'type' => 'link',
                            'text' => 'SV-Lehrer',
                            'url' => 'https://www.bkwitten.net/fur-unsere-schulerinnen/beratung/sv-lehrer/',
                        ],
                        [
                            'type' => 'heading',
                            'text' => 'Wo/Wann kann man sich treffen?',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Die Lern- und Nachhilfegruppen können sich von Montag bis Donnerstag zwischen 13:00 Uhr und 15:00 Uhr in zwei Räumen des B-Gebäudes treffen. Für die Raumbenutzung kann man sich formlos bei Herrn Faschian in Raum B007 anmelden.',
                        ],
                    ],
                ],
            ],
        ],

        'kontaktdaten' => [
            'title' => 'Kontaktdaten',
            'description' => 'Hier findest du wichtige Kontaktdaten des Berufskollegs Witten und der verschiedenen Ansprechpartner.',
            'image' => null,
            'content' => [

                [
                    'title' => 'Schulbüro',
                    'blocks' => [
                        [
                            'type' => 'text',
                            'text' => 'Das Schulbüro des Berufskollegs Witten befindet sich im Erdgeschoss des A-Gebäudes.',
                        ],
                        [
                            'type' => 'text',
                            'text' => 'Dort können unter anderem Fragen zur Online-Anmeldung geklärt, Informationen zu Schulangelegenheiten eingeholt, Schulbescheinigungen beantragt und Termine mit Lehrkräften, Mitarbeitenden oder der Schulleitung vereinbart werden.',
                        ],
                        [
                            'type' => 'person',
                            'name' => 'Schulbüro',
                            'phone' => '02302 920-0',
                            'email' => 'info@bkwitten.net',
                        ],
                        [
                            'type' => 'heading',
                            'text' => 'Öffnungszeiten',
                        ],
                        [
                            'type' => 'list',
                            'items' => [
                                'Montag bis Donnerstag: 07:15 bis 15:00 Uhr',
                                'Freitag: 07:15 bis 13:00 Uhr',
                                'Während der Ferien: Montag bis Freitag 10:00 bis 12:00 Uhr',
                            ],
                        ],
                        [
                            'type' => 'heading',
                            'text' => 'Team des Schulbüros',
                        ],
                        [
                            'type' => 'table',
                            'headers' => [
                                'Name',
                                'Tätigkeit',
                            ],
                            'rows' => [
                                ['Herr Mimietz', 'Schülerdatenbearbeitung; Zeugnisschreibung'],
                                ['Frau Hörschelmann', 'Allgemeine Schülerverwaltung; Beschaffung/Zahlungsabwicklungen'],
                                ['Frau Lüke', 'Allgemeine Schülerverwaltung; Bafög-Bearbeitung'],
                                ['Frau Gambalat', 'Terminverwaltung Schulleiter; Personalangelegenheiten'],
                            ],
                        ],
                    ],
                ],

                [
                    'title' => 'Schulverwaltungsassistentin',
                    'blocks' => [
                        [
                            'type' => 'person',
                            'name' => 'Frau Fragkouli',
                            'focus' => 'Schulverwaltung',
                        ],
                    ],
                ],

                [
                    'title' => 'Haustechnik',
                    'blocks' => [
                        [
                            'type' => 'person',
                            'name' => 'Herr Fritz',
                            'email' => 'hausmeister@bkwitten.net',
                        ],
                        [
                            'type' => 'person',
                            'name' => 'Herr Klingenhagen',
                            'email' => 'hausmeister@bkwitten.net',
                        ],
                    ],
                ],

                [
                    'title' => 'Schulleitung',
                    'blocks' => [
                        [
                            'type' => 'person',
                            'name' => 'Olaf Schmiemann',
                            'phone' => '02302 920-114',
                            'email' => 'schulleitung@bkwitten.net',
                        ],
                        [
                            'type' => 'person',
                            'name' => 'Barbara Jung',
                            'phone' => '02302 920-140',
                            'email' => 'schulleitung@bkwitten.net',
                        ],
                    ],
                ],
            ],
        ],

    ],
];