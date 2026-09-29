<?php

return [

    // Linkes Menü (Slide-Over Drawer)
    'main' => [
        [
            'label' => 'Test',
            'route' => 'home',
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
