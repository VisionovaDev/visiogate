<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Persona extends Model
{
    protected $table = 'persone';
    
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome', 'cognome', 'email', 'interno', 'telefono', 'accetta_visite', 'reparto_id'];

    public function reparto()
    {
        return $this->belongsTo(Reparto::class, 'reparto_id');
    }
}
