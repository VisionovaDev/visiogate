<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reparto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reparti';

    protected $fillable = ['nome_it', 'nome_en','nome_de', 'nome_fr', 'nome_es',  'sede_id'];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    // Attributo per ottenere il nome della sede
    public function getNomeSedeAttribute()
    {
        return $this->sede->nome ?? 'N/D'; // Assumi che la colonna per il nome nella tabella sedi sia 'nome'
    }

    public function persone()
    {
        return $this->hasMany(Persona::class, 'reparto_id');
    }
}
