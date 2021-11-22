<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $table = 'universidads';
    protected $fillable = ['nombre',
                            'descripcion',
                            'direccion',
                            'telefono',
                            'email',
                            'horario_lu_vier',
                            'horario_sabado',
                            'horario_domingo',
                            'ruc',
                            'activo',
                            'borrado',
                            'user_id',
                        'tipo_vista','logourl','nombre_organigrama','url_organigrama'];
	protected $guarded = ['id'];
}
