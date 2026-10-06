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
            'label' => 'FAQ',
            'route' => 'faq',
            'url' => '#',
        ],
        [
            'label' => 'Hier kann weiteres stehen',
            'url' => '#',
        ],
        [
            'label' => 'Homepage',
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
