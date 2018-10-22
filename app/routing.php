<?php

// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', ['GET', 'POST']], // action, url, HTTP method
        ['show', '/item/{id:\d+}', ['GET', 'POST']], // action, url, HTTP method
        ['add', '/item/add', ['GET', 'POST']], // action, url, HTTP method
        ['edit', '/edit/{id:\d+}', ['GET', 'POST']], // action, url, HTTP method
        ['delete', '/delete/{id:\d+}', ['GET', 'POST']] // action, url, method
    ],
    'Category' => [ // Controller
        ['index', '/categories', ['GET', 'POST']], // action, url, HTTP method
        ['show', '/category/{id:\d+}', ['GET', 'POST']] // action, url, HTTP method
    ]
];