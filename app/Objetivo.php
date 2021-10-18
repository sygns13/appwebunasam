<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    protected $table = 'objetivos';
    protected $fillable = [ 'numero',
                            'descripcion',
                            'tieneimagen',
                            'url',
                            'nivel',
                            'user_id',
                            'activo',
                            'borrado',
                            'facultad_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
