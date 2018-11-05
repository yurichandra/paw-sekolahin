<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{
    /**
     * User Transform.
     *
     * @param User $user
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'email' => $user->email,
            'phoneNumber' => $user->personal->phone_number,
            'noKtp' => $user->personal->identity_number,
        ];
    }
}
