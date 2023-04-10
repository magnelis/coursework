<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'header',
        'page_id',
    ];

    public function mediaPages()
    {
        return $this->hasMany(MediaPage::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
