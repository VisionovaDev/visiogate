<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Varchi;

class Sedi extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'sedi';

    protected $fillable = [
        'nome',
        'indirizzo',
	    'citta', 
	    'provincia',
	    'nazione',
	    'sito',
	    'email',
	    'telefono'  
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
            'deleted_at' => 'datetime',
        ];
    }

    public function varchi()
    {
        return $this->hasMany(Varchi::class);
    }

}
