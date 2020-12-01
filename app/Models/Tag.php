<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table        = 'entity__tags';
    protected $fillable     = ['tag_id', 'tag_name', 'tag_desc'];
    protected $primaryKey   = 'tag_id';

    public $timestamps      = false;

    public function post()
    {
        return $this->belongsToMany(
            Post::class,
            'entity__posts_tag',
            'tag_id',
            'post_id'
        );
    }
}
