<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'school_id',
        'title',
        'body',
        'target',
        'raised',
        'date',
    ];

    /**
     * Attributes that are hidden.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
        'school_id',
    ];

    /**
     * Define belongsTo relation with user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define hasOne relation with photo.
     */
    public function photo()
    {
        // return $this->hasOne(Photo::class, 'post_id');
    }

    /**
     * Define belongsTo relation.
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Define hasMany relation.
     */
    public function donations()
    {
        return $this->hasMany(Donation::class, 'campaign_id');
    }
}
