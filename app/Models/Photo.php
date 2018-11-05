<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public const DONATION = 1;
    public const CAMPAIGN = 2;
    public const PERSONAL = 3;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id',
        'path',
        'type',
    ];

    /**
     * Attributes for SoftDeletes.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];
}
