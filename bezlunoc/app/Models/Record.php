<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_at',
        'updated_at',
        'date_id',
        'time_id',
        'user_id',
        'size_id',
        'style_id',
        'status_id',
    ];

    public function style()
    {
        return $this->belongsTo(Style::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function date()
    {
        return $this->belongsTo(Working_day::class);
    }

    public function time()
    {
        return $this->belongsTo(Working_time::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
