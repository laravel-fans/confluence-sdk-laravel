<?php

return [
    'root_uri' => env('CONFLUENCE_ROOT_URI', 'http://localhost:8090/confluence/rest/api/'),
    'auth' => [
        env('CONFLUENCE_AUTH_USERNAME', 'admin'),
        env('CONFLUENCE_AUTH_PASSWORD', '123456'),
    ]
];
