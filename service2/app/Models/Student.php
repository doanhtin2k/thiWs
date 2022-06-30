<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'masv', 'email', 'phone', "birthday", 'branch', 'class', 'Country'
    ];
    public function transcripts()
    {
        return $this->hasOne(Transcripts::class);
    }
}
