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
                    'page' => 'test',
                    'bullet' => 'dot',
                ],
                [
                    'title' => 'Vendors',
                    'page' => 'test',
                    'bullet' => 'dot',
                ],
                [
                    'title' => 'Admins',
                    'page' => 'test',
                    'bullet' => 'dot',
                ],
            ]
        ],
        // Layout
        [
            'section' => 'Layout',
        ],
        [
            'title' => 'Themes',
            'desc' => '',
            'icon' => 'media/svg/icons/Design/Bucket.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Light Aside',
                    'page' => 'layout/themes/aside-light'
                ],
                [
                    'title' => 'Dark Header',
                    'page' => 'layout/themes/header-dark'
                ]
            ]
        ],
        [
            'title' => 'Subheaders',
            'desc' => '',
            'icon' => 'media/svg/icons/Code/Compiling.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Toolbar Nav',
                    'page' => 'layout/subheader/toolbar'
                ],
                [
                    'title' => 'Actions Buttons',
                    'page' => 'layout/subheader/actions'
                ],
                [
                    'title' => 'Tabbed Nav',
                    'page' => 'layout/subheader/tabbed'
                ],
                [
                    'title' => 'Classic',
                    'page' => 'layout/subheader/classic'
                ],
                [
                    'title' => 'None',
                    'page' => 'layout/subheader/none'
                ]
            ]
        ],
        [
            'title' => 'General',
            'icon' => 'media/svg/icons/General/Settings-1.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Fixed Content',
                    'page' => 'layout/general/fixed-content'
                ],
                [
                    'title' => 'Minimized Aside',
                    'page' => 'layout/general/minimized-aside'
                ],
                [
                    'title' => 'No Aside',
                    'page' => 'layout/general/no-aside'
                ],
                [
                    'title' => 'Empty Page',
                    'page' => 'layout/general/empty-page'
                ],
                [
                    'title' => 'Fixed Footer',
                    'page' => 'layout/general/fixed-footer'
                ],
                [
                    'title' => 'No Header Menu',
                    'page' => 'layout/general/no-header-menu'
                ]
            ]
        ],
        [
            'title' => 'Builder',
            'root' => true,
            'icon' => 'media/svg/icons/Home/Library.svg',
            'page' => 'builder',
            'visible' => 'preview',
        ],

        // CRUD
        [
            'section' => 'CRUD',
        ],
        [
            'title' => 'Forms',
            'icon' => 'media/svg/icons/Design/PenAndRuller.svg',
            'root' => true,
            'bullet' => 'dot',
            'submenu' => [
                [
                    'title' => 'Form Controls',
                    'desc' => '',
                    'icon' => 'flaticon-interface-3',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Base Inputs',
                            'page' => 'crud/forms/controls/base'
                        ],
                        [
                            'title' => 'Input Groups',
                            'page' => 'crud/forms/controls/input-group'
                        ],
                        [
                            'title' => 'Checkbox',
                            'page' => 'crud/forms/controls/checkbox'
                        ],
                        [
                            'title' => 'Radio',
                            'page' => 'crud/forms/controls/radio'
                        ],
                        [
                            'title' => 'Switch',
                            'page' => 'crud/forms/controls/switch'
                        ],
                        [
                            'title' => 'Mega Options',
                            'page' => 'crud/forms/controls/option'
                        ]
                    ]
                ],
                [
                    'title' => 'Form Widgets',
                    'desc' => '',
                    'icon' => 'flaticon-interface-1',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Datepicker',
                            'page' => 'crud/forms/widgets/bootstrap-datepicker'
                        ],
                        [
                            'title' => 'Datetimepicker',
                            'page' => 'crud/forms/widgets/bootstrap-datetimepicker'
                        ],
                        [
                            'title' => 'Timepicker',
                            'page' => 'crud/forms/widgets/bootstrap-timepicker'
                        ],
                        [
                            'title' => 'Daterangepicker',
                            'page' => 'crud/forms/widgets/bootstrap-daterangepicker'
                        ],
                        [
                            'title' => 'Tagify',
                            'page' => 'crud/forms/widgets/tagify'
                        ],
                        [
                            'title' => 'Touchspin',
                            'page' => 'crud/forms/widgets/bootstrap-touchspin'
                        ],
                        [
                            'title' => 'Maxlength',
                            'page' => 'crud/forms/widgets/bootstrap-maxlength'
                        ],
                        [
                            'title' => 'Switch',
                            'page' => 'crud/forms/widgets/bootstrap-switch'
                        ],
                        [
                            'title' => 'Multiple Select Splitter',
                            'page' => 'crud/forms/widgets/bootstrap-multipleselectsplitter'
                        ],
                        [
                            'title' => 'Bootstrap Select',
                            'page' => 'crud/forms/widgets/bootstrap-select'
                        ],
                        [
                            'title' => 'Select2',
                            'page' => 'crud/forms/widgets/select2'
                        ],
                        [
                            'title' => 'Typeahead',
                            'page' => 'crud/forms/widgets/typeahead'
                        ],
                        [
                            'title' => 'noUiSlider',
                            'page' => 'crud/forms/widgets/nouislider'
                        ],
                        [
                            'title' => 'Form Repeater',
                            'page' => 'crud/forms/widgets/form-repeater'
                        ],

                        [
                            'title' => 'Ion Range Slider',
                            'page' => 'crud/forms/widgets/ion-range-slider'
                        ],
                        [
                            'title' => 'Input Masks',
                            'page' => 'crud/forms/widgets/input-mask'
                        ],

                        [
                            'title' => 'Autosize',
                            'page' => 'crud/forms/widgets/autosize'
                        ],
                        [
                            'title' => 'Clipboard',
                            'page' => 'crud/forms/widgets/clipboard'
                        ],
                        [
                            'title' => 'Google reCaptcha',
                            'page' => 'crud/forms/widgets/recaptcha'
                        ]
                    ]
                ],
                [
                    'title' => 'Form Text Editors',
                    'desc' => '',
                    'icon' => 'flaticon-interface-1',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'TinyMCE',
                            'page' => 'crud/forms/editors/tinymce'
                        ],
                        [
                            'title' => 'CKEditor',
                            'bullet' => 'line',
                            'submenu' => [
                                [
                                    'title' => 'CKEditor Classic',
                                    'page' => 'crud/forms/editors/ckeditor-classic'
                                ],
                                [
                                    'title' => 'CKEditor Inline',
                                    'page' => 'crud/forms/editors/ckeditor-inline'
                                ],
                                [
                                    'title' => 'CKEditor Balloon',
                                    'page' => 'crud/forms/editors/ckeditor-balloon'
                                ],
                                [
                                    'title' => 'CKEditor Balloon Block',
                                    'page' => 'crud/forms/editors/ckeditor-balloon-block'
                                ],
                                [
                                    'title' => 'CKEditor Document',
                                    'page' => 'crud/forms/editors/ckeditor-document'
                                ],
                            ]
                        ],
                        [
                            'title' => 'Quill Text Editor',
                            'page' => 'crud/forms/editors/quill'
                        ],
                        [
                            'title' => 'Summernote WYSIWYG',
                            'page' => 'crud/forms/editors/summernote'
                        ],
                        [
                            'title' => 'Markdown Editor',
                            'page' => 'crud/forms/editors/bootstrap-markdown'
                        ],
                    ]
                ],
                [
                    'title' => 'Form Layouts',
                    'desc' => '',
                    'icon' => 'flaticon-web',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Default Forms',
                            'page' => 'crud/forms/layouts/default-forms'
                        ],
                        [
                            'title' => 'Multi Column Forms',
                            'page' => 'crud/forms/layouts/multi-column-forms'
                        ],
                        [
                            'title' => 'Basic Action Bars',
                            'page' => 'crud/forms/layouts/action-bars'
                        ],
                        [
                            'title' => 'Sticky Action Bar',
                            'page' => 'crud/forms/layouts/sticky-action-bar'
                        ]
                    ]
                ],
                [
                    'title' => 'Form Validation',
                    'desc' => '',
                    'icon' => 'flaticon-calendar-2',
                    'bullet' => 'dot',
                    'submenu' => [
                        [
                            'title' => 'Validation States',
                            'page' => 'crud/forms/validation/states'
                        ],
                        [
                            'title' => 'Form Controls',
                            'page' => 'crud/forms/validation/form-controls'
                        ],
                        [
                            'title' => 'Form Widgets',
                            'page' => 'crud/forms/validation/form-widgets'
                        ]
                    ]
                ]
            ]
        ],
    ]

];
