<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datoestadistico extends Model
{
    protected $table = 'datoestadisticos';
    protected $fillable = [ 'tipo',
                            'titulo',
                            'descripcion',
                            'tieneimagen',
                            'urlimagen',
                            'tienelink',
                            'urllink',
                            'textourl',
                            'cantidad',
                            'activo',
                            'borrado',
                            'user_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
