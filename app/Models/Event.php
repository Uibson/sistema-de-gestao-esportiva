<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'location',
        'logo',
        'modality_id',
        'rules',
    ];

    // Relacionamento com modalidade
    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    // Relacionamento com instituições (se aplicável)
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
