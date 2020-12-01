<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table        = 'entity__comments';
    protected $fillable     = ['comment_name', 'comment_email', 'comment_text'];
    protected $primaryKey   = 'comment_id';
}
