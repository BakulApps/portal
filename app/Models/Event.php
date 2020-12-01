<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Event extends Model
{
    use HasFactory;

    protected $table        = 'entity__events';
    protected $fillable     = ['event_image', 'event_name', 'event_place', 'event_time', 'event_date', 'event_galery'];
    protected $primaryKey   = 'event_id';
    public $timestamps      = false;


    public function home()
    {

    }
}
