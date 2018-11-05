<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * Define hasMany relations.
     */
    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'school_id');
    }
}
