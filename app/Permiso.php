<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';
    protected $fillable = [ 'facultad_id',
                            'programaestudio_id',
                            'nivel', 
                            'roles',
                            'user_id'];

	protected $guarded = ['id'];
}
