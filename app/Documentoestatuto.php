<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentoestatuto extends Model
{
    protected $table = 'documentoestatutos';
    protected $fillable = [ 'nombre',
                            'descripcion',
                            'url',
                            'posicion',
                            'activo',
                            'borrado',
                            'estatuto_id' ];

	protected $guarded = ['id'];
}
