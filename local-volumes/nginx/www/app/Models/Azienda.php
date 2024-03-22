<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

class Azienda extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
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
	    'privacy_es'
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

    public function getLogoFilePathAttribute()
    {
        return $this->getFirstMedia()->getUrl();
    }

    public function setProvinciaAttribute($value)
    {        
        $this->attributes['provincia'] = strtoupper($value);
    }

}
