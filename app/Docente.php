<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tieneimagen',
                            'urlimagen',
                            'activo',
                            'borrado',
                            'programaestudio_id',
                            'user_id'];
	protected $guarded = ['id'];
}
