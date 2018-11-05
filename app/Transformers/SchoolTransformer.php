<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\School;

class SchoolTransformer extends TransformerAbstract
{
    /**
     * Transform School.
     *
     * @param School $school
     */
    public function transform(School $school)
    {
        return [
            'id' => $school->id,
            'name' => $school->name,
            'address' => $school->address,
            'telephone' => $school->telephone,
        ];
    }
}
