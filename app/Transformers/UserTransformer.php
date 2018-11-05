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
            'name' => $user->name,
            'personal' => $this->personal($user),
        ];
    }

    public function personal(User $user)
    {
        if ($user->personal !== null) {
            return [
                'phoneNumber' => $user->personal->phone_number,
                'identityNumber' => $user->personal->identity_number,
            ];
        }

        return null;
    }
}
