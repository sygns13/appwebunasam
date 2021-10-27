<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licenciamiento extends Model
{
    protected $table = 'licenciamientos';
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
