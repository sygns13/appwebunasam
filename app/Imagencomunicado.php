<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagencomunicado extends Model
{
    protected $table = 'imagencomunicados';
    protected $fillable = [ 'nombre',
                            'descripcion',
                            'url',
                            'posicion',
                            'activo',
                            'borrado',
                            'comunicado_id' ];

	protected $guarded = ['id'];
}
