<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $fillable = [ 'nombre',
    'tipo_documento',
    'documento',
    'grados',
    'tieneimagen',
    'urlimagen',
    'tienelink',
    'urllink',
    'fecha',
    'activo',
    'borrado',
    'nivel',
    'facultad_id',
    'programaestudio_id',
    'departamentoacademico_id',
    'categoria',
    'regimen',
    'condicion',
    'experiencia',
    'publicaciones',
    'investigaciones',
    'especialidad',
    'telefono',
    'email','user_id','nivel'];
    
	protected $guarded = ['id'];
}
