<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentanteLegal extends Model
{
    use HasFactory;

    protected $table = 'representantes_legales';

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'telefono',
        'telefono_movil',
        'rol',
        'organizacion_id'
    ];

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class);
    }
}
?>
