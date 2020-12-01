<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table        = 'entity__categories';
    protected $fillable     = ['category_name', 'category_desc'];
    protected $primaryKey   = 'category_id';

    public $timestamps  = false;

    public function post()
    {
        return $this->hasOne(
            Post::class,
            'post_category',
            'category_id'
        );
    }

    static function name($id)
    {
        return self::where('category_id', $id)->value('category_name');
    }

}
