<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Employment;
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
        
        User::factory()->count(1)->create();
        Project::factory()->count(4)->create();
        Employment::factory()->count(2)->create();
    }
}
