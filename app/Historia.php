<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    protected $table = 'historias';
    protected $fillable = [ 'titulo',
                            'historia',
                            'tieneimagen',
                            'activo',
                            'borrado',
                            'user_id',
                            'facultad_id',
                            'programaestudio_id',
                            'nivel' ];

	protected $guarded = ['id'];
}
