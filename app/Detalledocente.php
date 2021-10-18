<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalledocente extends Model
{
    protected $table = 'detalledocentes';
    protected $fillable = [ 'nombre',
                            'especialidad',
                            'descripcion',
                            'telefono',
                            'email',
                            'tieneimagen',
                            'urlimagen',
                            'tienelink',
                            'urllink',
                            'textolink',
                            'activo',
                            'borrado',
                            'user_id',
                            'docente_id' ];

	protected $guarded = ['id'];
}
