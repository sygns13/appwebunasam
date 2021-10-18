<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenevento extends Model
{
    protected $table = 'imageneventos';
    protected $fillable = [ 'nombre',
                            'descripcion',
                            'url',
                            'posicion',
                            'activo',
                            'borrado',
                            'evento_id' ];

	protected $guarded = ['id'];
}
