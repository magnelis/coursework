<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Working_time extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'time',
    ];

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }
}
