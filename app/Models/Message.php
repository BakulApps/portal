<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table        = "entity__messages";
    protected $fillable     = ['message_name', 'message_email', 'message_subject', 'message_content', 'message_read'];
    protected $primaryKey   = 'message_id';

    static function unred()
    {
        return self::where('message_read', 1)->count();
    }
}
