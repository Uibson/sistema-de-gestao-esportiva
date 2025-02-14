<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'cnpj_cpf',
        'type',
        'email',
        'logo',
        'address',
        'inep',
    ];

    // Relacionamento com eventos (se aplicável)
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
