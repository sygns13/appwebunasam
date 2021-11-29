<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicadorsineace extends Model
{
    protected $table = 'indicadorsineaces';
    protected $fillable = [ 'titulo',
                            'tieneimagen',
                            'tienearchivo',
                            'descripcion',
                            'url',
                            'urlfile',
                            'tipo',
                            'nivel',
                            'user_id',
                            'activo',
                            'borrado',
                            'facultad_id',
                            'programaestudio_id', 'nombrefile'];

	protected $guarded = ['id'];
}
