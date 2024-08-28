<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    use HasFactory;

    protected $table = 'organizaciones';

    protected $fillable = [
        'nombre_organizacion',
        'nombre_organizador',
        'apellido_organizador',
        'regimen_fiscal',
        'rfc',
        'nombre_comercial',
        'correo_electronico',
        'telefono',
        'telefono_movil',
        'estatus',
        'usuario_id'
    ];

    public function representanteLegal()
    {
        return $this->hasOne(RepresentanteLegal::class);
    }
}
?>
