<?php

return [

    // Linkes Menü (Slide-Over Drawer)
    'main' => [
        [
            'label' => 'Start',
            'route' => 'home',
            'url' => '',
        ],
        [
            'label' => 'Veranstaltungen',
            'route' => 'information.kategorie',
            'url' => '#',
            'kategorie' => 'Veranstaltungen',
        ],
        [
            'label' => 'Angebote',
            'route' => 'information.kategorie',
            'url' => '#',
            'kategorie' => 'Angebote',
        ],
        [
            'label' => 'Organisatorisches',
            'route' => 'information.kategorie',
            'url' => '#',
            'kategorie' => 'Organisatorisches',
        ],
        [
            'label' => 'FAQ',
            'route' => 'faq',
            'url' => '#',
            // Unterseiten bzw. Dropdowns sind via faq.php dynamisch generiert
        ],
        [
            'label' => 'BKW-Homepage',
            'url' => 'https://www.bkwitten.net/',
        ],
        [
            'label' => 'Neue Info anlegen',
            'route' => 'info.anlegen',
        ],
    ],

    // Rechtes Menü (Benutzerkonto Dropdown)
    'account' => [
        [
            'label' => 'Anmeldung',
            'route' => 'login',
            'url' => '#',
        ],
        [
            'label' => 'Einstellungen',
            'route' => 'settings',
            'url' => '#',
            'divider' => true,
        ],
    ],

];
