<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampiRegistrazione extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'campi_registrazione';

    protected $fillable = ['registrazione_id', 'campi_modelli_registrazione_id', 'valore'];
}
