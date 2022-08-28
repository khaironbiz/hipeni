<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'education_level'   => 17,
                'nama_training'     => 'Basic Neurology Life Support',
                'slug'              => uniqid(),
                'created_by'        => 1,
                'icon'              => 'fas fa-heartbeat',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'education_level'   => 17,
                'nama_training'     => 'Askep Stroke Dasar',
                'slug'              => uniqid(),
                'created_by'        => 1,
                'icon'              => 'fas fa-wheelchair',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'education_level'   => 17,
                'nama_training'     => 'Askep Stroke Komprehensif',
                'slug'              => uniqid(),
                'created_by'        => 1,
                'icon'              => 'fas fa-wheelchair',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'education_level'   => 17,
                'nama_training'     => 'Askep Neurologi Dasar',
                'slug'              => uniqid(),
                'created_by'        => 1,
                'icon'              => 'fas fa-dna',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'education_level'   => 17,
                'nama_training'     => 'Perioperatif Bedah Saraf',
                'slug'              => uniqid(),
                'created_by'        => 1,
                'icon'              => 'fas fa-hospital-user',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'education_level'   => 17,
                'nama_training'     => 'Intra Operatif Bedah Saraf',
                'slug'              => uniqid(),
                'created_by'        => 1,
                'icon'              => 'fas fa-hospital-user',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'education_level'   => 17,
                'nama_training'     => 'Epilepsi dan Kedaruratan Kejang',
                'slug'              => uniqid(),
                'created_by'        => 1,
                'icon'              => 'fas fa-hospital-user',
                'created_at'        => now(),
                'updated_at'        => now()
            ]
        ];
        \DB::table('trainings')->insert($data);
    }
}
