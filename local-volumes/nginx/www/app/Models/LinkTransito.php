<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LinkTransito extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='link_transiti';
    
    protected $fillable = ['varco_id', 'codice', 'is_abilitato'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($link) {
            // Assegna un codice casuale se il campo 'codice' è vuoto
            if (empty($link->codice)) {
                $link->codice = Str::random(6);
            }
        });
    }

    // Accessor per ottenere il link completo
    public function getLinkCompletoAttribute()
    {
        // Ricava l'URL del sito dal file di configurazione di Laravel
        $baseUrl = config('app.url');
        return $baseUrl . '/transito/inizia/' . $this->codice;
    }
}
