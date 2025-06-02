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
            // Nurse specializations
            [
                'name' => 'Pediatric Nursing',
                'type' => 'nurse',
                'description' => 'Specialized care for infants, children, and adolescents.',
            ],
            [
                'name' => 'Critical Care Nursing',
                'type' => 'nurse',
                'description' => 'Care for patients with life-threatening conditions in ICU settings.',
            ],
            [
                'name' => 'Geriatric Nursing',
                'type' => 'nurse',
                'description' => 'Care for elderly patients, focusing on chronic conditions and mobility.',
            ],
            [
                'name' => 'Emergency Nursing',
                'type' => 'nurse',
                'description' => 'Rapid response and care in emergency and trauma situations.',
            ],
            [
                'name' => 'Oncology Nursing',
                'type' => 'nurse',
                'description' => 'Care for patients with cancer, including chemotherapy administration.',
            ],
            [
                'name' => 'Maternal and Newborn Nursing',
                'type' => 'nurse',
                'description' => 'Care for mothers during pregnancy, childbirth, and postpartum, and for newborns.',
            ],
            [
                'name' => 'Psychiatric Nursing',
                'type' => 'nurse',
                'description' => 'Care for patients with mental health disorders.',
            ],
            [
                'name' => 'Community Health Nursing',
                'type' => 'nurse',
                'description' => 'Promoting health and preventing disease in community settings.',
            ],
            [
                'name' => 'Surgical Nursing',
                'type' => 'nurse',
                'description' => 'Assisting in surgical procedures and post-operative care.',
            ],
            [
                'name' => 'Wound Care Nursing',
                'type' => 'nurse',
                'description' => 'Specialized care for patients with acute or chronic wounds.',
            ],

            // Doctor specializations
            [
                'name' => 'Cardiology',
                'type' => 'doctor',
                'description' => 'Specialization in heart and cardiovascular system disorders.',
            ],
            [
                'name' => 'Dermatology',
                'type' => 'doctor',
                'description' => 'Diagnosis and treatment of skin disorders.',
            ],
            [
                'name' => 'Neurology',
                'type' => 'doctor',
                'description' => 'Specialization in brain and nervous system disorders.',
            ],
            [
                'name' => 'Orthopedics',
                'type' => 'doctor',
                'description' => 'Care for the musculoskeletal system including bones and joints.',
            ],
            [
                'name' => 'Pediatrics',
                'type' => 'doctor',
                'description' => 'Medical care for infants, children, and adolescents.',
            ],
            [
                'name' => 'Psychiatry',
                'type' => 'doctor',
                'description' => 'Treatment of mental health disorders.',
            ],
            [
                'name' => 'General Surgery',
                'type' => 'doctor',
                'description' => 'Surgical procedures for a wide range of common conditions.',
            ],
            [
                'name' => 'Ophthalmology',
                'type' => 'doctor',
                'description' => 'Diagnosis and treatment of eye conditions.',
            ],
            [
                'name' => 'Gynecology & Obstetrics',
                'type' => 'doctor',
                'description' => 'Women’s reproductive health and childbirth.',
            ],
            [
                'name' => 'Oncology',
                'type' => 'doctor',
                'description' => 'Treatment of cancer and tumors.',
            ],
        ];

        foreach ($expertises as $expertise) {
            AreaOfExpertise::updateOrCreate(['name' => $expertise['name'], 'type' => $expertise['type']], ['description' => $expertise['description']]);
        }
    }
}
