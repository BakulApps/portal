<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table    = 'entity__users';
    protected $fillable = [
        'user_fullname',
        'user_name',
        'user_pass',
        'remember_token',
        'user_desc',
        'user_facebook',
        'user_instagram',
        'user_twitter'
    ];
    protected $hidden       = ['password', 'remember_token',];
    protected $casts        = ['email_verified_at' => 'datetime',];
    protected $primaryKey   = 'user_id';
    public $timestamps      = false;

    public function getAuthPassword()
    {
        return $this->user_pass;
    }
}
