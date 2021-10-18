<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programaestudio extends Model
{
    protected $table = 'programaestudios';
    protected $fillable = [ 'nombre',
                            'descripcion',
                            'direccion',
                            'telefono',
                            'email',
                            'activo',
                            'borrado',
                            'user_id',
                            'nivel',
                            'facultad_id' ];

	protected $guarded = ['id'];
}
