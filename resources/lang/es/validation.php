<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'string' => 'El campo :attribute debe ser una cadena de texto.',
    'max' => [
        'string' => 'El campo :attribute no puede tener más de :max caracteres.',
    ],
    'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    // Agrega otras reglas de validación si es necesario
    'attributes' => [
        'nombreOrganizacion' => 'nombre de la organización',
        'regimenFiscal' => 'régimen fiscal',
        'rfc' => 'RFC',
        'nombreComercial' => 'nombre comercial',
        'correo' => 'correo electrónico',
        'telefono' => 'teléfono',
        'usuario' => 'usuario',
        'contrasena' => 'contraseña',
        'rol' => 'rol',
        'nombre_organizador' => 'nombre',
        'apellido_organizador' => 'apellidos',
        'correo_electronico' => 'correo electrónico'
    ],
];
