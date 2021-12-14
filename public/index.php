<?php

use App\HelloPrinter;
use App\Models\User;

require(__DIR__ . '/../vendor/autoload.php');

(new Helloprinter())->hi();

$data = [
    'name' => 'Khurshed',
    'country' => 'Russia',
    'password' => 'pass',
    'email' =>  'khtsrand@gmail.com'
];

(new User)->create($data);