<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resumen extends Model
{
    protected $table = 'resumens';
    protected $fillable = [ 'titulo',
                            'resumen',
                            'tieneimagen',
                            'activo',
                            'borrado',
                            'user_id',
                            'facultad_id',
                            'programaestudio_id',
                            'nivel' ];

	protected $guarded = ['id'];
}
