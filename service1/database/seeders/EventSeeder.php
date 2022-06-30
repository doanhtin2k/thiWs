<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event;


class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $event1 = Event::create([
            'name'=> "event 1",
            'start_time' => '2022-01-01',
            'end_time' => '2022-05-21',
            'description' => 'description event 1'
        ]);
        $event2 = Event::create([
            'name'=> "event 2",
            'start_time' => '2022-02-01',
            'end_time' => '2022-06-21',
            'description' => 'description event 2'
        ]);
        $event3 = Event::create([
            'name'=> "event 3",
            'start_time' => '2022-02-01',
            'end_time' => '2022-03-21',
            'description' => 'description event 3'
        ]);
        $event4 = Event::create([
            'name'=> "event 4",
            'start_time' => '2022-09-12',
            'end_time' => '2022-12-20',
            'description' => 'description event 4'
        ]);
    }
}
