<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infraestructura extends Model
{
    protected $table = 'infraestructuras';
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'tieneimagen',
                            'urlimagen',
                            'activo',
                            'borrado',
                            'programaestudio_id',
                            'user_id' ];

	protected $guarded = ['id'];
}
