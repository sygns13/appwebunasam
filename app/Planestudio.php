<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planestudio extends Model
{
    protected $table = 'planestudios';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tieneimagen',
                            'urlimagen',
                            'activo',
                            'borrado',
                            'programaestudios_id',
                            'user_id' ];

	protected $guarded = ['id'];
}
