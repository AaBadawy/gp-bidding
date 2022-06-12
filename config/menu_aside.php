<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/dashboard',
            'new-tab' => false,
        ],

        [
            'title' => 'Users',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'bullet' => 'line',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Clients',
                    'page' => '/dashboard/users/client',
                    'bullet' => 'dot',
                ],
                [
                    'title' => 'Vendors',
                    'page' => '/dashboard/users/vendor',
                    'bullet' => 'dot',
                ],
//                [
//                    'title' => 'Admins',
//                    'page' => 'test',
//                    'bullet' => 'dot',
//                ],
            ]
        ],
        // Layout
        [
            'section' => 'System',
        ],
        [
            'title' => 'Auction',
            'desc' => '',
            'icon' => 'media/svg/icons/Tools/Hummer2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'All Auctions',
                    'page' => 'dashboard/auctions/',

                ],
                [
                    'title' => 'Create Auction',
                    'page' => 'dashboard/auctions/create',
                ]
            ]
        ],
        [
            'title' => 'products',
            'desc' => '',
            'icon' => 'media/svg/icons/Tools/Angle Grinder.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'All Products',
                    'page' => 'dashboard/products'
                ],
                [
                    'title' => 'Create Product',
                    'page' => 'dashboard/products/create'
                ],
            ]
        ],

        [
            'section' =>'controlling'
        ],
        [
            'title' => 'vendor-requests',
            'desc' => '',
            'icon' => 'media/svg/icons/Tools/Angle Grinder.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'All Requests',
                    'page' => 'dashboard/vendor-requests'
                ],
            ]
        ],

    ],

];
