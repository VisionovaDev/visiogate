<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Varchi;

class Sede extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sedi';

    protected $fillable = [
        'nome',
        'indirizzo',
        'citta',
        'cap',
        'provincia',
        'nazione',
        'telefono',
        'oggetto_email_entrata_it' ,
        'oggetto_email_entrata_en' ,
        'oggetto_email_entrata_de',
        'oggetto_email_entrata_fr',
        'oggetto_email_entrata_es',
        'msg_email_entrata_it',
        'msg_email_entrata_en',
        'msg_email_entrata_de',
        'msg_email_entrata_fr',
        'msg_email_entrata_es',
        'oggetto_email_uscita_it' ,
        'oggetto_email_uscita_en' ,
        'oggetto_email_uscita_de',
        'oggetto_email_uscita_fr',
        'oggetto_email_uscita_es',
        'msg_email_uscita_it',
        'msg_email_uscita_en',
        'msg_email_uscita_de',
        'msg_email_uscita_fr',
        'msg_email_uscita_es',
        'regolamento_it',
        'regolamento_en',
        'regolamento_de',
        'regolamento_fr',
        'regolamento_es',
        'is_email_entrata_abilitata',
        'is_email_uscita_abilitata'
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
        return $this->hasMany(Varco::class);
    }


    public function setProvinciaAttribute($value)
    {
        $this->attributes['provincia'] = strtoupper($value);
    }
}
