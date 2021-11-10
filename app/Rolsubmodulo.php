<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rolsubmodulo extends Model
{
    protected $table = 'rolsubmodulos';
    protected $fillable = [ 'nivel',
                            'modulo_id',
                            'submodulo_id',
                            'user_id'];

	protected $guarded = ['id'];
}
