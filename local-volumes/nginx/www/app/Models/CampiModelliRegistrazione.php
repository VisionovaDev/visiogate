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
        'is_obbligatorio',
        'posizione',
        'is_abilitato',
    ];

    public function modelliRegistrazione()
    {
        return $this->belongsTo(ModelloRegistrazione::class, 'modelli_registrazione_id');
    }
}
