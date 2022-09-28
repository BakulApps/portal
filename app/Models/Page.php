<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table    = 'entity__pages';
    protected $fillable = ['page_id', 'page_name', 'page_value'];
    protected $primaryKey   = 'page_id';
    public $timestamps      = false;
}
