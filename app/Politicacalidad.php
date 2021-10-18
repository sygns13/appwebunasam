<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Politicacalidad extends Model
{
    protected $table = 'politicacalidads';
    protected $fillable = [ 'titulo',
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
