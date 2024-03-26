<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Varco extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'varchi';

    protected $fillable = [
        'nome',
        'sede_id',
        'is_entrata',
        'is_uscita'
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

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function links()
    {
        return $this->hasMany(LinkTransito::class);
    }
}
