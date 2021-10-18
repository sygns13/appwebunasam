<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antiplagio extends Model
{
    protected $table = 'antiplagios';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tieneimagen',
                            'url',
                            'tienelink',
                            'urllink',
                            'activo',
                            'borrado',
                            'nivel',
                            'facultad_id',
                            'programaestudio_id'];

	protected $guarded = ['id'];
}
