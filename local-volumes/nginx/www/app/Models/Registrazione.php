<?php

namespace App\Models;

use App\Models\Badge;
use App\Models\ModelliRegistrazione;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registrazione extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="registrazioni";
    
    protected $fillable = ['modelli_registrazione_id', 'badge_id', 'lingua'];

    public function modelloRegistrazione()
    {
        return $this->belongsTo(ModelloRegistrazione::class, 'modelli_registrazione_id');
    }

    public function badge()
    {
        return $this->belongsTo(Badge::class, 'badge_id');
    }
}
