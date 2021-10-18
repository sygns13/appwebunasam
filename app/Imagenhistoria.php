<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenhistoria extends Model
{
    protected $table = 'imagenhistorias';
    protected $fillable = [ 'nombre',
                            'descripcion',
                            'url',
                            'posicion',
                            'activo',
                            'borrado',
                            'historia_id' ];

	protected $guarded = ['id'];
}
