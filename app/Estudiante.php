<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tieneimagen',
                            'urlimagen',
                            'tienelink',
                            'urllink',
                            'fecha',
                            'activo',
                            'borrado',
                            'nivel',
                            'facultad_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
