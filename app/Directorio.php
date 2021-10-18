<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    protected $table = 'directorios';
    protected $fillable = [ 'nombre',
                            'posision',
                            'descripcion',
                            'tieneimagen',
                            'url',
                            'telefono',
                            'email',
                            'nivel',
                            'activo',
                            'borrado',
                            'user_id',
                            'facultad_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
