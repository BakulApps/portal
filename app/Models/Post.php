<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table        = 'entity__posts';
    protected $fillable     = ['post_image', 'post_author', 'post_category', 'post_title', 'post_content'];
    protected $primaryKey   = 'post_id';

    public function tag()
    {
        return $this->belongsToMany(
            Tag::class,
            'entity__posts_tag',
            'post_id',
            'tag_id'
        );
    }

    public function comment()
    {
        return $this->belongsToMany(
            Comment::class,
            'entity__posts_comment',
            'post_id',
            'comment_id'
        );
    }

    public function category()
    {
        return $this->hasOne(
            Category::class,
            'category_id',
            'post_category'
        );
    }

    public function user()
    {
        return $this->hasOne(
            User::class,
            'user_id',
            'post_author'
        );
    }

    public function created_at()
    {
        return Carbon::parse($this->created_at)->formatLocalized('%I %b %Y');
    }
}
