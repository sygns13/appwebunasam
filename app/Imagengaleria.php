<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagengaleria extends Model
{
    protected $table = 'imagengalerias';
    protected $fillable = [ 'nombre',
                            'descripcion',
                            'url',
                            'posicion',
                            'activo',
                            'borrado',
                            'galeria_id' ];

	protected $guarded = ['id'];
}
