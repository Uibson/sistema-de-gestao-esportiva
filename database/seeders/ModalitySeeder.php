<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Modality;

class ModalitySeeder extends Seeder
{
    public function run()
    {
        Modality::insert([
            [
                'name' => 'Natação',
                'type' => 'Individual',
                'rules' => 'Os atletas devem usar toucas e maiôs regulamentares.',
                'min_participants' => 3,
                'max_participants' => 8,
                'age_category' => '12-17 anos',
                'image' => 'modality_images/swimming.jpg',
            ],
            [
                'name' => 'Futebol',
                'type' => 'Coletiva',
                'rules' => 'Cada equipe deve ter no mínimo 7 jogadores e no máximo 11.',
                'min_participants' => 7,
                'max_participants' => 11,
                'age_category' => '15-17 anos',
                'image' => 'modality_images/soccer.jpg',
            ],
            [
                'name' => 'Judô',
                'type' => 'Individual',
                'rules' => 'Os atletas devem estar na categoria de peso correta.',
                'min_participants' => 2,
                'max_participants' => 4,
                'age_category' => '10-14 anos',
                'image' => 'modality_images/judo.jpg',
            ],
        ]);
    }
}
