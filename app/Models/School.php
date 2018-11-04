<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'telephone',
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
     * Define hasMany relations.
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'school_id');
    }
}
