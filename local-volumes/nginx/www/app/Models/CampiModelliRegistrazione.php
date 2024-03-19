<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CampiModelliRegistrazione extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'campi_modelli_registrazione';

    protected $fillable = [
        'modelli_registrazione_id',
        'lingua',
        'nome',
        'label',
        'placeholder',
        'tipo',
        'obbligatorio',
        'posizione',
    ];

    public function modelliRegistrazione()
    {
        return $this->belongsTo(ModelliRegistrazione::class, 'modelli_registrazione_id');
    }
}
