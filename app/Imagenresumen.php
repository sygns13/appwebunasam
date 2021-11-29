<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenresumen extends Model
{
    protected $table = 'imagenresumens';
    protected $fillable = [ 'nombre',
                            'descripcion',
                            'url',
                            'posicion',
                            'activo',
                            'borrado',
                            'resumen_id' ];

	protected $guarded = ['id'];
}
