<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultads';
    protected $fillable = [ 'nombre',
                            'descripcion',
                            'direccion',
                            'telefono',
                            'email',
                            'activo',
                            'borrado',
                            'user_id',
                            'nivel',
                            'logourl',
                        'tipo_vista','nombre_organigrama','url_organigrama'];
	protected $guarded = ['id'];
}
