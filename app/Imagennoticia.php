<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagennoticia extends Model
{
    protected $table = 'imagennoticias';
    protected $fillable = [ 'nombre',
                            'descripcion',
                            'url',
                            'posicion',
                            'activo',
                            'borrado',
                            'noticia_id' ];

	protected $guarded = ['id'];
}
