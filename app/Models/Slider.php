<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    /**
     * @var int|mixed
     */
    protected $table    = 'entity__sliders';
    protected $fillable = [
        'slider_id',
        'slider_bg_image',
        'slider_image',
        'slider_title',
        'slider_content',
        'slider_button',
        'slider_status',
        'slider_creater',
        'slider_updater'
    ];
    protected $primaryKey   = 'slider_id';

}
