<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    public const DONATION = 1;
    public const CAMPAIGN = 2;

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
