<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Varchi extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $table = 'varchi';

    protected $fillable = [
        'nome',
        'sedi_id',
        'is_ingresso',
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
        return $this->belongsTo(Sedi::class);
    }
}
