<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'start_time', 'end_time', 'description'
    ];
    public function award()
    {
        return $this->hasMany(Award::class);
    }
}
