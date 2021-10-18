<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $fillable = [ 'posision',
                            'nombre',
                            'url',
                            'activo',
                            'borrado',
                            'nivel',
                            'user_id',
                            'facultad_id',
                            'programaestudio_id'];

	protected $guarded = ['id'];
}
