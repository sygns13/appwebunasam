<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organigrama extends Model
{
    protected $table = 'organigramas';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tieneimagen',
                            'urlimagen',
                            'tienelink',
                            'urllink',
                            'activo',
                            'borrado',
                            'nivel',
                            'facultad_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
