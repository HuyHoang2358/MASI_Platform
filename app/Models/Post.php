<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'description',
        'seo_id',
    ];

    public function seo()
    {
        return $this->belongsTo(Seo::class, 'seo_id');
    }

}
