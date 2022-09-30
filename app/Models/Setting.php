<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table    = 'entity__settings';
    protected $fillable = ['name', 'value'];
    public $timestamps      = false;

    public function value($name)
    {
        return self::where('name', $name)->value('value');
    }
}
