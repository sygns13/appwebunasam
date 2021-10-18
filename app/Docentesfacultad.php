<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docentesfacultad extends Model
{
    protected $table = 'docentesfacultads';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tieneimagen',
                            'urlimagen',
                            'tienelink',
                            'urllin',
                            'fecha',
                            'activo',
                            'borrado',
                            'nivel',
                            'facultad_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
