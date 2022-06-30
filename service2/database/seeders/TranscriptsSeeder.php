<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transcripts;

class TranscriptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $transcripts1 = Transcripts::create([
            'score_1'=> "7",
            'score_2' => '8',
            'score_3' => '9',
            'score_4' => '9',
            'score_5' => '9',
            'student_id' => '1'
        ]);
        $transcripts2 = Transcripts::create([
            'score_1'=> "9",
            'score_2' => '8',
            'score_3' => '9',
            'score_4' => '9',
            'score_5' => '9',
            'student_id' => '2'
        ]);
        $transcripts3 = Transcripts::create([
            'score_1'=> "6",
            'score_2' => '8',
            'score_3' => '9',
            'score_4' => '9',
            'score_5' => '9',
            'student_id' => '3'
        ]);
        $transcripts4 = Transcripts::create([
            'score_1'=> "7",
            'score_2' => '6',
            'score_3' => '9',
            'score_4' => '9',
            'score_5' => '9',
            'student_id' => '4'
        ]);
    }
}
