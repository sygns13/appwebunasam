<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programaestudio extends Model
{
    protected $table = 'programaestudios';
    protected $fillable = [ 'id',
                        'nombre',
                        'descripcion',
                        'direccion',
                        'telefono',
                        'email',
                        'activo',
                        'borrado',
                        'user_id',
                        'nivel',
                        'facultad_id',
                        'logourl',
                        'tipo_vista',
                        'nombre_organigrama',
                        'url_organigrama'];

	protected $guarded = ['id'];
}
