<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transcripts extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'score_1', 'score_2', 'score_3', 'score_4', "score_5", 'student_id'
    ];
}
