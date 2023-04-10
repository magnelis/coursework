<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaPage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'media',
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
