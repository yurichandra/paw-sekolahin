<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'phone_number',
        'identity_number',
    ];

    /**
     * Attributes for SoftDelete.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * Attributes that are hidden.
     */
    protected $hidden = [
        'user_id',
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
