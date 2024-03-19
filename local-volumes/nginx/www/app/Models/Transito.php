<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transito extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="transiti";

    protected $fillable = [
        'varchi_id', 
        'link_transiti_id', 
        'registrazioni_id', 
        'is_ingresso', 
        'is_uscita', 
        'abilitato'
    ];

    public function varchi()
    {
        return $this->belongsTo(Varco::class);
    }

    public function linkTransiti()
    {
        return $this->belongsTo(LinkTransito::class);
    }

    public function registrazioni()
    {
        return $this->belongsTo(Registrazione::class);
    }
}
