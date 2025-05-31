<?php

namespace Database\Seeders;

use App\Models\AreaOfExpertise;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaOfExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expertises = [
            [
                'name' => 'Pediatric Nursing',
                'description' => 'Specialized care for infants, children, and adolescents.',
            ],
            [
                'name' => 'Critical Care Nursing',
                'description' => 'Care for patients with life-threatening conditions in ICU settings.',
            ],
            [
                'name' => 'Geriatric Nursing',
                'description' => 'Care for elderly patients, focusing on chronic conditions and mobility.',
            ],
            [
                'name' => 'Emergency Nursing',
                'description' => 'Rapid response and care in emergency and trauma situations.',
            ],
            [
                'name' => 'Oncology Nursing',
                'description' => 'Care for patients with cancer, including chemotherapy administration.',
            ],
            [
                'name' => 'Maternal and Newborn Nursing',
                'description' => 'Care for mothers during pregnancy, childbirth, and postpartum, and for newborns.',
            ],
            [
                'name' => 'Psychiatric Nursing',
                'description' => 'Care for patients with mental health disorders.',
            ],
            [
                'name' => 'Community Health Nursing',
                'description' => 'Promoting health and preventing disease in community settings.',
            ],
            [
                'name' => 'Surgical Nursing',
                'description' => 'Assisting in surgical procedures and post-operative care.',
            ],
            [
                'name' => 'Wound Care Nursing',
                'description' => 'Specialized care for patients with acute or chronic wounds.',
            ],
        ];

        foreach ($expertises as $expertise) {
            AreaOfExpertise::updateOrCreate(
                ['name' => $expertise['name']],
                [
                    'name' => $expertise['name'],
                    'description' => $expertise['description'],
                ]
            );
        }
    }
}
