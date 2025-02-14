<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event;
use App\Models\Modality;

class EventSeeder extends Seeder
{
    public function run()
    {
        // Certifique-se de que existam modalidades no banco de dados
        $modalities = Modality::all();

        Event::insert([
            [
                'name' => 'Campeonato Regional de Natação',
                'start_date' => '2025-03-01',
                'end_date' => '2025-03-05',
                'location' => 'Piscina Olímpica Municipal',
                'logo' => 'event_logos/regional_swimming.jpg',
                'modality_id' => $modalities->where('name', 'Natação')->first()->id,
                'rules' => 'O tempo mínimo para qualificação é 30 segundos nos 50m Livre.',
            ],
            [
                'name' => 'Torneio Interescolar de Futebol',
                'start_date' => '2025-04-10',
                'end_date' => '2025-04-15',
                'location' => 'Estádio Municipal',
                'logo' => 'event_logos/school_soccer.jpg',
                'modality_id' => $modalities->where('name', 'Futebol')->first()->id,
                'rules' => 'Os jogadores devem usar chuteiras apropriadas.',
            ],
            [
                'name' => 'Campeonato Estadual de Judô',
                'start_date' => '2025-05-20',
                'end_date' => '2025-05-22',
                'location' => 'Ginásio Poliesportivo',
                'logo' => 'event_logos/state_judo.jpg',
                'modality_id' => $modalities->where('name', 'Judô')->first()->id,
                'rules' => 'Os atletas devem estar na categoria de peso correta.',
            ],
        ]);
    }
}
