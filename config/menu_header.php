<?php
// Header menu
return [

    'items' => [
        [],
        [
            'title' => 'Dashboard',
            'root' => true,
            'page' => '/dashboard',
            'new-tab' => false,
        ],
        [
            'title' => 'Auctions',
            'root' => true,
            'page' => '/dashboard/auctions',
            'new-tab' => false,
        ],
        [
            'title' => 'Products',
            'root' => true,
            'page' => '/dashboard/products',
            'new-tab' => false,
        ],
        [
            'title' => 'Clients',
            'root' => true,
            'page' => '/dashboard/users/client',
            'new-tab' => false,
        ],
    ]

];
