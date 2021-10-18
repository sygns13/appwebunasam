<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gestioncalidad extends Model
{
    protected $table = 'gestioncalidads';
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
