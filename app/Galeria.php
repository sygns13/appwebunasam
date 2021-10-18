<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    protected $table = 'galerias';
    protected $fillable = [ 'posision',
                            'nombre',
                            'descripcion',
                            'fecha',
                            'fechafin',
                            'activo',
                            'borrado',
                            'nivel',
                            'facultad_id',
                            'programaestudio_id' ];

	protected $guarded = ['id'];
}
