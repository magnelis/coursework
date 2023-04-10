<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tattoo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'created_at',
        'updated_at',
        'style_id',
    ];

    public function style()
    {
        return $this->belongsTo(Style::class);
    }
}
