<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Numerosalumno extends Model
{
    protected $table = 'numerosalumnos';
    protected $fillable = [ 'tipo',
                            'cantidad',
                            'anio',
                            'programaestudio_id',
                            'activo',
                            'borrado',
                            'user_id' ];

	protected $guarded = ['id'];
}
