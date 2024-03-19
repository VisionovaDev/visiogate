<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelloRegistrazione extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'modelli_registrazione'; // Specifica il nome della tabella se non segue la convenzione standard di Laravel

    protected $fillable = ['nome']; // Permette l'assegnazione di massa del campo 'nome'

}
