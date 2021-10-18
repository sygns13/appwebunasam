<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalleplanestudio extends Model
{
    protected $table = 'detalleplanestudios';
    protected $fillable = [ 'planestudio_id',
                            'fecha',
                            'vigente',
                            'titulo',
                            'descripcion',
                            'tieneimagen',
                            'urlimagen',
                            'tienelink',
                            'urllink',
                            'textolink',
                            'activo',
                            'borrado',
                            'user_id' ];

	protected $guarded = ['id'];
}
