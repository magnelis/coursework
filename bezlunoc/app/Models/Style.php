<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'style',
        'price',
    ];

    public function tattoos()
    {
        return $this->hasMany(Tattoo::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
