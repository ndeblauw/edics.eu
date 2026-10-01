<?php

namespace App\Console\Commands;

use App\Models\Edic;
use Illuminate\Console\Command;

class UpdateEdicsCommand extends Command
{
    protected $signature = 'edics:update';

    protected $description = 'Sync the EDIC list with the latest European Commission data';

    public function handle(): void
    {
        $edics = [
            [
                'slug' => 'alt-edic',
                'acronym' => 'ALT-EDIC',
                'name' => 'Alliance for Language Technologies',
                'description' => 'European initiative for language technologies and AI, coordinating federated data production, neutral evaluation services and projects worth over €60 million.',
                'url' => 'https://www.alt-edic.eu',
                'status' => 'established',
            ],
            [
                'slug' => 'ldt-cityverse',
                'acronym' => 'LDT CitiVERSE EDIC',
                'name' => 'Networked Local Digital Twins towards the CitiVERSE',
                'description' => 'Collaboration between 14 countries and numerous cities on interoperable local digital twins for urban decision-making, covering environmental, mobility and housing challenges.',
                'url' => 'https://www.cityverse.eu',
                'status' => 'established',
            ],
            [
                'slug' => 'europeum-edic',
                'acronym' => 'EUROPEUM-EDIC',
                'name' => 'European Blockchain Partnership and European Blockchain Services Infrastructure',
                'description' => 'Governs and operates the European Blockchain Services Infrastructure (EBSI) on behalf of its Member States.',
                'url' => 'https://europeum.eu',
                'status' => 'established',
            ],
            [
                'slug' => 'dc-edic',
                'acronym' => 'DC-EDIC',
                'name' => 'Digital Commons European Digital Infrastructure Consortium',
                'description' => 'Open Source / Digital Commons. One-stop shop for open source communities, developers and public administrations, supporting funding access, scale-up and strategic digital commons projects.',
                'url' => 'https://digital-commons-edic.eu',
                'status' => 'established',
            ],
            [
                'slug' => 'impacts-edic',
                'acronym' => 'IMPACTS-EDIC',
                'name' => 'Innovative Massive Public Administration interConnected Transformation Services',
                'description' => 'Digital Government / Interoperability. Accelerates interoperable digital public services and the implementation of the Interoperable Europe Act through GovTech, cross-border services and cooperation among Member States.',
                'url' => null,
                'status' => 'established',
            ],
            [
                'slug' => 'csc-edic',
                'acronym' => 'CSC-EDIC',
                'name' => 'Cybersecurity Skills Coalition',
                'description' => 'Cybersecurity Skills. Addresses the EU cybersecurity skills gap through training, upskilling, reskilling, skills intelligence and support for the EU Cybersecurity Skills Academy.',
                'url' => 'https://csc-edic.eu',
                'status' => 'established',
            ],
            [
                'slug' => 'agri-food-edic',
                'acronym' => 'Agri-Food EDIC',
                'name' => 'European Digital Infrastructure Consortium for Agri-Food',
                'description' => 'Strengthens EU-level digital and data infrastructure for the agriculture and food sectors, including a digital Farm ID aligned with the EU Digital Identity Wallet.',
                'url' => null,
                'status' => 'established',
            ],
            [
                'slug' => 'esna',
                'acronym' => 'ESNA',
                'name' => 'European Startup Nations Alliance',
                'description' => 'Improves framework conditions for startup ecosystems across Europe and provides quality data and insights for policymakers. Preparing to become a formally established EDIC.',
                'url' => 'https://www.esnalliance.eu',
                'status' => 'preparing',
            ],
            [
                'slug' => 'ebrains',
                'acronym' => 'EBRAINS',
                'name' => 'EBRAINS',
                'description' => 'Open research infrastructure gathering data, tools and computing facilities for brain-related research, built with interoperability at the core. Preparing to become a formally established EDIC.',
                'url' => 'https://www.ebrains.eu/',
                'status' => 'preparing',
            ],
            [
                'slug' => 'genome-edic',
                'acronym' => 'Genome EDIC',
                'name' => 'Genome European Digital Infrastructure Consortium',
                'description' => 'Future legal entity for the European Genomic Data Infrastructure, part of the 1+ Million Genomes initiative. Preparing to become a formally established EDIC.',
                'url' => null,
                'status' => 'preparing',
            ],
        ];

        foreach ($edics as $edic) {
            $this->info("Syncing `{$edic['acronym']}`...");

            Edic::updateOrCreate(
                ['slug' => $edic['slug']],
                [
                    'acronym' => $edic['acronym'],
                    'name' => $edic['name'],
                    'description' => $edic['description'],
                    'url' => $edic['url'],
                    'status' => $edic['status'],
                ],
            );
        }

        $this->comment('Synced '.count($edics).' EDICs.');
    }
}
