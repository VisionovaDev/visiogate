<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Badge extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['numero', 'sede_id'];

    private $max_code_lenght=8;

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    // Accessor per ottenere il nome della sede
    public function getSedeAttribute()
    {
        return $this->sede->nome ?? null; 
    }

    public function getCodiceAttribute()
    {
        // Calcola il numero di zeri necessari per ottenere un codice di lunghezza 5
        $numZeri = $this->max_code_lenght - strlen($this->prefisso) - strlen((string)$this->numero) - strlen((string)$this->sede_id);
        $zeri = str_repeat('0', max($numZeri, 0));

        return "{$this->prefisso}{$this->sede_id}-{$zeri}{$this->numero}";
    }
}
