<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rolmodulo extends Model
{
    protected $table = 'rolmodulos';
    protected $fillable = [ 'user_id',
                            'modulo_id',
                            'rolessub'];

	protected $guarded = ['id'];
}
