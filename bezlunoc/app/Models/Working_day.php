<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Working_day extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'date',
    ];

    public function timelines()
    {
        return $this->hasMany(Timeline::class, 'date_id');
    }

    public function workingTimes()
    {
        return $this->belongsToMany(Working_time::class, 'timelines', 'date_id', 'time_id');
    }
}
