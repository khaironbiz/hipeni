<?php

namespace Database\Seeders;

use App\Models\Education_level;
use App\Models\Education_type;
use App\Models\Education_user;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *php artisan db:seed

     * @return void
     */
    public function run()
    {

        $this->call([
            UserSeeder::class,
            PartnerSeeder::class,
            EventSeeder::class,
            EducationTypeSeeder::class,
            EducationLevelSeeder::class,
            EducationUserSeeder::class,
            VideoCategorySeeder::class,
            VideoSeeder::class,
            ProfesiSeeder::class,
            UserJobSeeder::class,
            ProvincesSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            VillagesSeeder::class,
            UserOrganizationSeeder::class,
            TrainingSeeder::class,
        ]);
    }
}
