<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $table = 'contenidos';
    protected $fillable = [ 'titulo',
                            'mediaurl',
                            'descripcion',
                            'tieneimagen',
                            'url',
                            'nivel',
                            'activo',
                            'borrado',
                            'user_id',
                            'facultad_id',
                            'programaestudio_id', 'tipo'];

	protected $guarded = ['id'];
}
