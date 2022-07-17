<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'category_id'
    ];

    public function category(){
        return $this->BelongsTo(Categories::class, 'category_id');
    }

    public function blog(){
        return $this->BelongsTo(Blogs::class, 'blog_id');
    }
}
