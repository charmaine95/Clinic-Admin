<?php

use Illuminate\Database\Seeder;
use App\Specialization;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = ['Allergy & Immunology', 'Anesthesiology', 'Dermatology', 'Emergency Medicine', 'Family Medicine','Otolaryngology','Pathology-Anatomic & Clinical ','Pediatrics','Physical Medicine & Rehabilitation','Internal Medicine','Plastic Surgery', 'Preventive Medicine','Psychiatry','Radiology-Diagnostic','Medical Genetics', 'Neurological Surgery', 'Neurology', 'Ophthalmology', 'Thoracic Surgery', 'Urology', '--Others--'];
        foreach ($specializations as $value) {
            Specialization::create([
                'specialization' => $value
            ]);
        }
    }
}
