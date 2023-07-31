<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();
        $user = User::factory()->create([
            'name'  => 'Keanu Reeves',
            'email' => 'matrix@gmail.com'
        ]);
        
        Listing::factory(100)->create([
            'user_id' => $user->id
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // Manual way of seeding database table
        // Listing::create([
        //     'title'       => 'Senior Laravel Developer',
        //     'tags'        => 'laravel, javascript',
        //     'company'     => 'PyCorp',
        //     'location'    => 'Cebu City, Cebu',
        //     'email'       => 'email1@email.com',
        //     'website'     => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ut sit quibusdam corrupti enim? Inventore, fuga. Mollitia quod voluptatibus ipsam fugiat ullam, vitae expedita doloremque, quas officia natus itaque delectus!'
        // ]);
        
        // Listing::create([
        //     'title'       => 'Junior Frontend Developer',
        //     'tags'        => 'vuejs, reactjs, javascript',
        //     'company'     => 'Edlusion',
        //     'location'    => 'Mandaue City, Cebu',
        //     'email'       => 'edlusion@email.com',
        //     'website'     => 'https://www.edlusion.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam ut sit quibusdam corrupti enim? Inventore, fuga. Mollitia quod voluptatibus ipsam fugiat ullam, vitae expedita doloremque, quas officia natus itaque delectus!'
        // ]);
    }
}
