<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Organizacion;
use App\Models\RepresentanteLegal;
use App\Models\User;
use Spatie\Permission\Models\Role;

class OMVController extends Controller
{
    //
    public function index()
    {   
        $omvs = Organizacion::all();
        $roles = Role::all();

        return view('admin_omv.omv.content', compact('omvs', 'roles'));
    }

    // En tu controlador
    public function store(Request $request)
    {
        // Definir las reglas de validación
        $rules = [
            'regimen_fiscal' => 'required|string',
            'rfc' => 'required|string|max:13',
            'nombre_comercial' => 'required|string|max:255',
            'correo_electronico' => 'required|email',
            'telefono' => 'required|string|max:15',
            'contrasena' => 'required|string|min:8',
            'rol' => 'required|exists:roles,id',
            'nombre_organizador' => 'required|string|max:255',
            'apellido_organizador' => 'required|string|max:255',
        ];

        // Añadir reglas para el representante legal si es necesario
        if ($request->regimen_fiscal == 'Persona Moral') {
            $rules = array_merge($rules, [
                'nombre' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'correo_representante' => 'required|email',
                'telefono_representante' => 'required|string|max:15',
                'telefono_movil_representante' => 'nullable|string|max:15',
            ]);
        }

        // Validar los datos del formulario
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }


        // Validar si el usuario ya existe en la tabla 'users'
        $usuario = User::where('name', $request->usuario)->first();
        
        if ($usuario) {
            return response()->json([
                'errors' => [
                    'usuario' => ['El usuario ya está registrado.']
                ]
            ], 422);
        }

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $request->usuario,
            'password' => bcrypt($request->contrasena), 
            'email' => $request->regimen_fiscal == 'Persona Moral' ? $request->correo_representante : $request->correo_electronico,
        ]);

        $role = Role::findOrFail($request->rol);
        $user->assignRole($role->id);

        // Guardar la organización
        $organizacion = new Organizacion();
        $organizacion->fill($request->only([
            'nombre_organizacion',
            'regimen_fiscal',
            'rfc',
            'nombre_comercial',
            'correo_electronico',
            'telefono',
            'telefono_movil',
            'estatus',
            'nombre_organizador',
            'apellido_organizador'
        ]));
        $organizacion->user_id = $user->id; // Asignar el ID del usuario a la organización
        $organizacion->save();

        // Guardar el representante legal si es Persona Moral
        if ($request->regimen_fiscal == 'Persona Moral') {
            $representante = new RepresentanteLegal();
            $representante->fill($request->only([
                'nombre',
                'apellidos',
                'correo_representante' => 'correo',
                'telefono_representante' => 'telefono',
                'telefono_movil_representante' => 'telefono_movil',
            ]));
            $representante->organizacion_id = $organizacion->id; // Relación con la organización
            $representante->save();
        }

        // Obtener la nueva lista de OMVs y retornar como HTML
        $omvs = Organizacion::all(); // Puedes ajustar esta consulta según sea necesario

        $html = view('admin_omv.omv.partials.omv_table_body', compact('omvs'))->render();

        return response()->json($html);
    }



}
