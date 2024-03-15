<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Azienda extends Model
{
    use HasFactory;
    protected $table = 'aziende';

    protected $fillable = [
        'nome',
        'indirizzo',
	    'citta', 
        'cap', 
	    'provincia',
	    'nazione',
	    'sito',
	    'email',
	    'telefono',
	    'privacy_it',
	    'privacy_en',
	    'privacy_de',
	    'privacy_fr',
	    'privacy_es',
	    'logo_file_path'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
   
}
