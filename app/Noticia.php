<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = 'noticias';
    protected $fillable = [ 'fecha',
                            'hora',
                            'titular',
                            'desarrollo',
                            'tieneimagen',
                            'nivel',
                            'user_id',
                            'facultad_id',
                            'programaestudio_id',
                            'activo',
                            'borrado' ];

	protected $guarded = ['id'];
}
