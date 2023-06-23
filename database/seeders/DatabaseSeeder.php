<?php

namespace Database\Seeders;

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
<<<<<<< HEAD
        $seeds = [UserRolesSeeder::class, UserSeeder::class, StudioManagerSeeder::class, StudiouserSeeder::class];
      foreach($seeds as $seed){
        $this->call($seed);
      }

=======
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class
        ]);
>>>>>>> aa3445f (projects done)
    }
}
