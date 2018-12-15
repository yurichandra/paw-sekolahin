<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email',
        'password',
        'generated_at',
        'last_used_at',
    ];

    /**
     * Casts attributes dates
     *
     * @var array
     */
    protected $dates = [
        'generated_at',
        'last_used_at',
    ];

    /**
     * Attributes that are hidden.
     */
    protected $hidden = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
