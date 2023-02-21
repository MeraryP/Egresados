<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(CarreraSeeder::class);
<<<<<<< HEAD
        $this->call(GeneroSeeder::class); 
=======
        $this->call(GeneroSeeder::class);
>>>>>>> 1744dc4240a0a8d3610dbea27ee825ccd0dda8ea
        $this->call(UserSeeder::class);
    }
}
