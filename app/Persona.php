<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $fillable = [ 'dni',
                            'apellidos',
                            'nombres',
                            'telefono',
                            'direccion',
                            'cargo',
                            'activo',
                            'borrado' ];
	protected $guarded = ['id'];
}
