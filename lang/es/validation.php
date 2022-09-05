<?php

return[
    'required' => 'El campo :attribute es obligatorio',
    'unique' => 'Ese :attribute ya está en uso',
    'min' => [
        'array' => 'El :attribute debe tener al menos :min elemento.',
        'file' => 'El :attribute debe tener al menos :min kilobytes.',
        'numeric' => 'El :attribute debe tener al menos :min.',
        'string' => 'El :attribute debe tener al menos :min caracteres.',
    ], 
    'max' => [
        'array' => 'El :attribute no debe tener más de :max elemento.',
        'file' => 'El :attribute no debe tener más de :max kilobytes.',
        'numeric' => 'El :attribute no debe tener más de :max.',
        'string' => 'El :attribute no debe tener más de :max caracteres.',
    ],
    'between' => [
        'array' => 'El :attribute debe tener entre :min y :max elementos.',
        'file' => 'El :attribute debe tener entre :min y :max kilobytes.',
        'numeric' => 'El :attribute debe tener entre :min y :max.',
        'string' => 'El :attribute debe tener entre :min y :max caracteres.',
    ],
    'same' => 'El :attribute y :other no coinciden.',

    'attributes' => [
        'name' => 'nombre',
        'username' => 'nombre de usuario',
        'email' => 'correo',
        'password' => 'contraseña',
        'password_confirmation' => 'confirmar contraseña',
        'userID' => 'ID usuario',
    ]
];
