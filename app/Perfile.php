<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfile extends Model
{
    protected $table = 'perfiles';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tipo',
                            'tieneimagen',
                            'urlimagen',
                            'tienelink',
                            'urllink',
                            'textolink',
                            'activo',
                            'borrado',
                            'programaestudio_id',
                            'user_id' ];

	protected $guarded = ['id'];
}
