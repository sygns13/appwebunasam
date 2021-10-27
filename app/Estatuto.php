<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estatuto extends Model
{
    protected $table = 'estatutos';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tieneimagen',
                            'activo',
                            'borrado',
                            'user_id',
                            'facultad_id',
                            'programaestudio_id',
                            'nivel',
                            'url' ];

	protected $guarded = ['id'];
}
