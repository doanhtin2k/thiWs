<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Award;
class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $event1 = Award::create([
            'name'=> "giai nhat event 1",
            'description' => 'description',
            'award_giver' => "Nguyen Van A",
            'salary' => 5000000,
            'event_id' => 1
        ]);
        $event2 = Award::create([
            'name'=> "giai nhi event 1",
            'description' => 'description',
            'award_giver' => "Nguyen Van A1",
            'salary' => 4000000,
            'event_id' => 1
        ]);
        $event3 = Award::create([
            'name'=> "giai ba event 1",
            'description' => 'description',
            'award_giver' => "Nguyen Van A2",
            'salary' => 3000000,
            'event_id' => 1
        ]);
        $event4 = Award::create([
            'name'=> "giai nhat event 2",
            'description' => 'description',
            'award_giver' => "Nguyen Van B",
            'salary' => 10000000,
            'event_id' => 2
        ]);
        $event5 = Award::create([
            'name'=> "giai nhi event 2",
            'description' => 'description',
            'award_giver' => "Nguyen Van B2",
            'salary' => 6000000,
            'event_id' => 2
        ]);
        $event6 = Award::create([
            'name'=> "giai ba event 2",
            'description' => 'description',
            'award_giver' => "Nguyen Van B3",
            'salary' => 2000000,
            'event_id' => 2
        ]);
    }
}
