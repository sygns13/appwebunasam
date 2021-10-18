<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redsocial extends Model
{
    protected $table = 'redsocials';
    protected $fillable = [ 'nombre',
                            'url',
                            'urlredsocial',
                            'activo',
                            'borrado',
                            'nivel',
                            'user_id',
                            'programaestudio_id',
                            'facultad_id' ];

	protected $guarded = ['id'];
}
