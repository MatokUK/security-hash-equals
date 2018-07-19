<?php
$username = $argv[1];
$password = $argv[2];

$users = ['matok' => 'sidechannel',
          'admin' => 'jru8h5fhuhfhf58',
];

if (isset($users[$username])) {
    if (hash_equals($users[$username], $password)) {
        echo "Welcome $username\n";
    }
} else {
    echo "sorry!\n";
    
    throw new \Exception('You are not allowed here!');
}

