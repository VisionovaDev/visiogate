<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reparto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reparti';

    protected $fillable = ['nome_it', 'nome_en','nome_de', 'nome_fr', 'nome_es',  'sedi_id'];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sedi_id');
    }

    // Attributo per ottenere il nome della sede
    public function getNomeSedeAttribute()
    {
        return $this->sede->nome ?? 'N/D'; // Assumi che la colonna per il nome nella tabella sedi sia 'nome'
    }
}
