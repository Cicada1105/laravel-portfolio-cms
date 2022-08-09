<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Employment;
use App\Models\Education;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Project::truncate();
        Employment::truncate();
        Education::truncate();
        
        User::factory()->count(1)->create();
        Project::factory()->count(4)->create();
        Employment::factory()->count(2)->create();
        Education::factory()->count(3)->create();
    }
}
