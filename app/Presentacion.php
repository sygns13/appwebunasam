<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentacion extends Model
{
    protected $table = 'presentacions';
    protected $fillable = [ 'titulo',
                            'subtitulo',
                            'descripcion',
                            'tieneimagen',
                            'url',
                            'nivel',
                            'activo',
                            'borrado',
                            'user_id',
                            'facultad_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
