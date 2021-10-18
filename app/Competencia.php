<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    protected $table = 'competencias';
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
                            'user_id'];

	protected $guarded = ['id'];
}
