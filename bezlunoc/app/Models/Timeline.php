<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'freely',
        'date_id',
        'time_id',
    ];

    public function workTime()
    {
        return $this->belongsTo(Working_time::class, 'time_id');
    }

    public function workDay()
    {
        return $this->belongsTo(Working_day::class, 'date_id');
    }
}
