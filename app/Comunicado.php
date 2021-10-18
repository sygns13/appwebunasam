<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    protected $table = 'comunicados';
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
                            'borrado'];

	protected $guarded = ['id'];
}
