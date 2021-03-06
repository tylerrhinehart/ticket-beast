<?php

use Carbon\Carbon;
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
//        $this->call(UsersTableSeeder::class);

        factory(App\Concert::class)->states('published')->create([
            'title' => "The Red Chord",
            'subtitle' => "with Animosity and Lethargy",
            'venue' => "The Mosh Pit",
            'venue_address' => "123 Example Lane",
            'city' => "laraville",
            'state' => "ON",
            'zip' => "17916",
            'date' => Carbon::parse('2018-12-13 8:00pm'),
            'ticket_price' => 3250,
            'additional_information' => "This concert is 19+."
        ])->addTickets(10);
    }
}
