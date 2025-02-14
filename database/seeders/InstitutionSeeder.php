<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Institution;

class InstitutionSeeder extends Seeder
{
    public function run()
    {
        Institution::insert([
            [
                'name' => 'Escola Municipal São João',
                'cnpj_cpf' => '12345678901234',
                'type' => 'Escola',
                'email' => 'escola.saojoao@example.com',
                'logo' => 'logos/school_logo_1.jpg',
                'address' => 'Rua das Flores, 123, Centro, São Paulo - SP',
                'inep' => '12345678',
            ],
            [
                'name' => 'Universidade Federal de Tecnologia',
                'cnpj_cpf' => '98765432109876',
                'type' => 'Universidade',
                'email' => 'uft@example.com',
                'logo' => 'logos/university_logo_1.jpg',
                'address' => 'Avenida dos Estudantes, 456, Campus Universitário, Curitiba - PR',
                'inep' => null,
            ],
            [
                'name' => 'Clube Atlético Central',
                'cnpj_cpf' => '55544433322211',
                'type' => 'Clube',
                'email' => 'clube.central@example.com',
                'logo' => 'logos/club_logo_1.jpg',
                'address' => 'Rua do Esporte, 789, Bairro Esportivo, Rio de Janeiro - RJ',
                'inep' => null,
            ],
        ]);
    }
}
