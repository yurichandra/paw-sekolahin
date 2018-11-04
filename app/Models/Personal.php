<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal extends Model
{
    use SoftDeletes;

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
}
