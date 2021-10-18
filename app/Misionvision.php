<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Misionvision extends Model
{
    protected $table = 'misionvisions';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tipo',
                            'activo',
                            'borrado',
                            'tieneimagen',
                            'url',
                            'nivel',
                            'user_id',
                            'facultad_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
