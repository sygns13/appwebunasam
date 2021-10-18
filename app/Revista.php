<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    protected $table = 'revistas';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tieneimagen',
                            'urlimagen',
                            'tienerevista',
                            'urlrevista',
                            'fecha',
                            'activo',
                            'borrado',
                            'nivel',
                            'facultad_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
