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
