<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();

        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston MA',
        //     'email' => 'email@email.com',
        //     'website' => 'https://lramplin.co.uk',
        //     'description' => "Life finds a way. What do they got in there? King Kong? Just my luck, no ice. Yeah, but your scientists were so preoccupied with whether or not they could, they didn't stop to think if they should. Did he just throw my cat out of the window? Yeah, but your scientists were so preoccupied with whether or not they could, they didn't stop to think if they should."
        // ]);

        // Listing::create([
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend, api',
        //     'company' => 'Stark Industries',
        //     'location' => 'New York, NY',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://lramplin.co.uk',
        //     'description' => "Life finds a way. What do they got in there? King Kong? Just my luck, no ice. Yeah, but your scientists were so preoccupied with whether or not they could, they didn't stop to think if they should. Did he just throw my cat out of the window? Yeah, but your scientists were so preoccupied with whether or not they could, they didn't stop to think if they should."
        // ]);

        Listing::factory(6)->create();
    }
}
