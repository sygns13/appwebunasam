<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = [ 'fecha',
                            'hora',
                            'titulo',
                            'desarrollo',
                            'tieneimagen',
                            'nivel',
                            'user_id',
                            'programaestudio_id',
                            'facultad_id',
                            'activo',
                            'borrado' ];

	protected $guarded = ['id'];
}
