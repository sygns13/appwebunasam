<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalleinfraestructura extends Model
{
    protected $table = 'detalleinfraestructuras';
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
