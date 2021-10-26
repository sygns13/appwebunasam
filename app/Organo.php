<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organo extends Model
{
    protected $table = 'organos';
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
                            'programaestudio_id', 'tipo'];

	protected $guarded = ['id'];
}
