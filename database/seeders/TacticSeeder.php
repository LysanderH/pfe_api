<?php

namespace Database\Seeders;

use App\Models\Tactic;
use Illuminate\Database\Seeder;

class TacticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tactics = [
            'attaque à la découverte',
            'Échec double',
            'La fourchette',
            'Le clouage',
            'L’enfilade',
            'L’élimination d’un défenseur',
            'La déviation',
            'L’attraction',
            'L’étouffement',
            'L’ouverture d’une ligne',
            'L’évacuation',
            'L’attaque rayons X',
            'L’interférence',
            'Sacrifice',
            'Zugzwang',
            'Zwischenzug'
        ];

        foreach ($tactics as $tactic) {
            Tactic::create([
                'name' => $tactic,
            ]);
        }
    }
}
