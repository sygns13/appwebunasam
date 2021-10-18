<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detallegradotitulo extends Model
{
    protected $table = 'detallegradotitulos';
    protected $fillable = [ 'fecha',
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
                            'user_id',
                            'gradotitulo_id' ];

	protected $guarded = ['id'];
}
