<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Define relation between user and personal.
     */
    public function personal()
    {
        return $this->hasOne(Personal::class);
    }

    /**
     * Define relation between user and donations.
     */
    public function donations()
    {
        return $this->hasMany(Donation::class, 'user_id');
    }

    /**
     * Define relation between user and campaigns.
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'user_id');
    }

    /**
     * Define relation between user and token.
     */
    public function token()
    {
        return $this->hasOne(Token::class, 'user_id');
    }
}
