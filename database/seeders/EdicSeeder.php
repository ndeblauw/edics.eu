<?php

namespace Database\Seeders;

use App\Models\Edic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EdicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* make a seeder for the info below - use the migration for the strucure. Put the data in an array and then loop over the elements to create the models

        **ALT-EDIC** (Alliance for Language Technology)

- Focuses on European language technologies and AI
- 18 contributing members, 27 members and observers total
- Coordinates projects worth over €60 million
- Provides federated data production and neutral evaluation services
- Currently expanding team (6 by summer, 10 by year-end)
- Technical infrastructure deployment planned for second half of year

**LDT CityVerse** (Digital Twin Cities)

- Focuses on digital twins for urban decision-making processes
- Addresses environmental, mobility, and housing challenges in cities
- Uses visualization technologies to simulate different development scenarios
- Collaboration between 14 countries and numerous cities
- Aims to make different digital twins interoperable for reuse of data

**ESNA** (European Startup Nations Alliance - preparing to become EDIC)

- Born from a political declaration by 26 member states in 2021
- Improves framework conditions for startup ecosystems across Europe
- Provides quality data and insights for policymakers
- Serves as a political platform for alignment between countries
- Team of 20 people working on the initiative

**EBRAINS** (preparing to become EDIC)

- Digital research infrastructure for neuroscience/brain sciences
- Provides access to high-quality scientific and medical research data
- Offers modeling and simulation tools for brain research
- Develops brain atlases and 3D visualization capabilities
- Connected to high-power computing systems
- Currently comprises 11 national nodes

        */

        // Execute what is asked in the comments above
        $edics = [
            [
                'acronym' => 'ALT-EDIC',
                'name' => 'Alliance for Language Technology',
                'slug' => 'alt-edic',
                'description' => 'Focuses on European language technologies and AI. Coordinates projects worth over €60 million.',
                'url' => 'https://www.alt-edic.eu',
                'status' => 'established',
            ],
            [
                'acronym' => 'LDT CityVerse',
                'name' => 'Digital Twin Cities',
                'slug' => 'ldt-cityverse',
                'description' => 'Focuses on digital twins for urban decision-making processes. Collaboration between 14 countries and numerous cities.',
                'url' => 'https://www.cityverse.eu',
                'status' => 'established',
            ],
            [
                'acronym' => 'ESNA',
                'name' => 'European Startup Nations Alliance',
                'slug' => 'esna',
                'description' => 'Improves framework conditions for startup ecosystems across Europe. Provides quality data and insights for policymakers.',
                'url' => 'https://www.esna.eu',
                'status' => 'preparing',
            ],
            [
                'acronym' => 'EBRAINS',
                'name' => 'EBRAINS',
                'slug' => 'ebrains',
                'description' => 'Open research infrastructure that gathers data, tools and computing facilities for brain-related research, built with interoperability at the core.',
                'url' => 'https://www.ebrains.eu/',
                'status' => 'preparing',
            ],
        ];

        foreach ($edics as $edic) {
            Edic::firstOrCreate([
                'acronym' => $edic['acronym'],
                'name' => $edic['name'],
                'slug' => $edic['slug'],
            ], [
                'description' => $edic['description'] ?? null,
                'url' => $edic['url'] ?? null,
                'status' => $edic['status'] ?? 'idea',
            ]);
        }

    }
}
