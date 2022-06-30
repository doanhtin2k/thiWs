<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'description', 'award_giver', 'salary', 'event_id'
    ];
}
