<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'rules',
        'min_participants',
        'max_participants',
        'age_category',
        'image',
    ];

    // Relacionamento com eventos
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
