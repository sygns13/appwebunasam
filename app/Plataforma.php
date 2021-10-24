<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plataforma extends Model
{
    protected $table = 'plataformas';
    protected $fillable = [ 'id',
                            'nombre',
                            'url',
                            'activo',
                            'borrado',
                            'nivel',
                            'user_id',
                            'facultad_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
