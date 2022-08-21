<?php 

return [
    'access' => [
        'list-category' => 'Categories_List',
        'create-category' => 'Categories_Create',
        'edit-category' => 'Categories_Edit',
        'delete-category' => 'Categories_Delete',

        'list-brand' => 'Brands_List',
        'create-brand' => 'Brands_Create',
        'edit-brand' => 'Brands_Edit',
        'delete-brand' => 'Brands_Delete',

        'list-product' => 'Products_List',
        'create-product' => 'Products_Create',
        'edit-product' => 'Products_Edit',
        'delete-product' => 'Products_Delete',

        'list-menu' => 'Menus_List',
        

    ],
    
    'table_module' => [
        'Categories',
        'Brands',
        'Sliders',
        'Products',
        'Settings',
        'Menus',
        'Users',
        'Roles'
    ],

    'module_children' => [
        'List',
        'Create',
        'Edit',
        'Delete'
    ]

]













?>