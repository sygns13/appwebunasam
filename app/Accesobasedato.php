<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accesobasedato extends Model
{
    protected $table = 'accesobasedatos';
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
