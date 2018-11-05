<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'campaign_id',
        'amount',
        'status',
        'message',
    ];

    /**
     * Define belongsTo relation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define hasOne relation.
     */
    public function photo()
    {
        return $this->hasOne(Photo::class, 'post_id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
