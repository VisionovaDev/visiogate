<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoTransito extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='tipo_transiti';

    protected $fillable = [
        'nome'
    ];
}
