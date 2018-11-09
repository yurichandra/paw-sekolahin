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

    /**
     * Return hasOne relation.
     */
    public function personal()
    {
        return $this->hasOne(Personal::class, 'photo_id');
    }
}
