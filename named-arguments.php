<?php

function savePerson(
    string $name,
    int $age,
    string $country,
    int $height,
    string $momName,
    string $preferedIDE
){
    return 'person saved';
}
// echo savePerson(
//     'lucas',
//     30,
//     'Brazil',
//     164,
//     'Glaucia',
//     'Vscode'
// );

$array = [
    "name" => 'Tom',
    'preferedIDE' => 'Vscode',
    'momName' => 'Glaucia',
    'country' => 'Brazil',
    'height' => 174,
    'age' => 22,
];

// echo savePerson(
//     name:'lucas',
//     age:30,
//     country:'Brazil',
//     height:164,
//     momName:'Glaucia',
//     preferedIDE:'Vscode'
// );

echo savePerson(...$array);