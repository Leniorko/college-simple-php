<?php

const FILE_PATH_HTML = 'html/';

$menu = [
    'main' => ['name' => 'Main', 'html' => 'main.php'],
    'product' => [
        'name' => 'Products', 'html' => 'product.php',
        'sub' => [
            'pr11' => ['name' => 'Product11', 'html' => 'product11.php'],
            'pr12' => ['name' => 'Product12', 'html' => 'product12.php'],
            'pr13' => ['name' => 'Product13', 'html' => 'product13.php'],
        ]
    ],
    'product2' => [
        'name' => 'Products2', 'html' => 'product2.php',
        'sub' => [
            'pr11' => ['name' => 'Product11', 'html' => 'product11.php'],
            'pr12' => ['name' => 'Product12', 'html' => 'product12.php'],
            'pr13' => ['name' => 'Product13', 'html' => 'product13.php'],
        ]
    ],
    'about' => ['name' => 'About us', 'html' => 'about.php'],
    'company' => ['name' => 'Company',  'html' => 'main.php'],
    "register"=> ['name'=> 'Register', 'html' => 'register.php']
];
