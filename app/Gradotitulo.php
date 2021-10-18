<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gradotitulo extends Model
{
    protected $table = 'gradotitulos';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tieneimagen',
                            'urlimagen',
                            'activo',
                            'borrado',
                            'programaestudio_id',
                            'user_id' ];

	protected $guarded = ['id'];
}
