<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamentoacademico extends Model
{
    protected $table = 'departamentoacademicos';
    protected $fillable = [ 'nombre',
                            'descripcion',
                            'direccion',
                            'telefono',
                            'email',
                            'tieneimagen',
                            'url',
                            'director',
                            'descripcion_director',
                            'descripcion_corta_director',
                            'tieneimagen_director',
                            'url_director',
                            'activo',
                            'borrado',
                            'facultad_id',
                            'user_id'];

	protected $guarded = ['id'];
}