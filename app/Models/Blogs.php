<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function categories()
    {
        return $this->hasMany(BlogCategories::class, 'blog_id');
    }
}
