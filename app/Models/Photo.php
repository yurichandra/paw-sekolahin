<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

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
