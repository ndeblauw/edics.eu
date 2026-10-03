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
                'description' => 'Addresses the scarcity of European language data by building a common European language technologies infrastructure, including Large Language Models for EU regional and official languages.',
                'url' => 'https://www.alt-edic.eu',
                'status' => 'established',
            ],
            [
                'slug' => 'ldt-cityverse',
                'acronym' => 'LDT CitiVERSE EDIC',
                'name' => 'Networked Local Digital Twins towards the CitiVERSE',
                'description' => 'Connects existing local digital twins across Europe into the EU CitiVERSE, using data, analytics and AI to simulate urban planning scenarios such as traffic, air quality, decarbonisation and congestion.',
                'url' => 'https://ldtcitiverse-edic.eu/',
                'status' => 'established',
            ],
            [
                'slug' => 'europeum-edic',
                'acronym' => 'EUROPEUM-EDIC',
                'name' => 'European Blockchain Partnership and European Blockchain Services Infrastructure',
                'description' => 'Develops and expands the European Blockchain Services Infrastructure (EBSI) to deliver trusted EU-wide cross-border public services and reinforces cooperation on Web3 and decentralised technologies.',
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
                'description' => 'Supports digital innovation in Europe\'s agri-food sector, developing a common Digital Farm ID and exploring AI for risk management, traceability and carbon certification.',
                'url' => 'https://edic4agrifood.eu/',
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
                'slug' => 'cancer-image',
                'acronym' => 'EUCAIM',
                'name' => 'Cancer Image Europe EDIC',
                'description' => 'The future EDIC aims to contribute to the Cancer Image Europe platform which aims to link and make available large amounts of cancer image data and linked clinical information to clinicians, researchers and innovators.',
                'url' => 'https://cancerimage.eu/',
                'status' => 'preparing',
            ],
            [
                'slug' => 'mobility',
                'acronym' => 'MoLo',
                'name' => 'EDIC for Mobility and Logistics',
                'description' => 'Aims to boost data- and AI-driven innovations for mobility and logistics through cross-border use cases such as multimodal freight visibility and traffic management.',
                'url' => null,
                'status' => 'preparing',
            ],
            [
                'slug' => 'genome-edic',
                'acronym' => 'Genome EDIC',
                'name' => 'Genome European Digital Infrastructure Consortium',
                'description' => 'Future legal entity for the European Genomic Data Infrastructure, part of the 1+ Million Genomes initiative. Preparing to become a formally established EDIC.',
                'url' => 'https://gdi.onemilliongenomes.eu/',
                'status' => 'preparing',
            ],
            [
                'slug' => 'tef-health',
                'acronym' => 'TEF-Health',
                'name' => 'Testing and Experimentation Facility for Health AI and Robotics',
                'description' => 'European Testing and Experimentation Facility (TEF) for health AI and robotics, not an EDIC. Rumours suggest the consortium is preparing to launch an EDIC.',
                'url' => 'https://tefhealth.eu',
                'status' => 'preparing',
            ],
        ];

        $synced = 0;

        foreach ($edics as $edic) {
            if (Edic::onlyTrashed()->where('slug', $edic['slug'])->exists()) {
                $this->warn("Skipping `{$edic['acronym']}` (previously deleted).");

                continue;
            }

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

            $synced++;
        }

        $this->comment('Synced '.$synced.' EDICs.');
    }
}
