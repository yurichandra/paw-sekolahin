<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes;

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
     * Attributes for soft deletes.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
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
        return $this->hasOne(Photo::class, 'post_id');
    }

    /**
     * Define belongsTo relation.
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
