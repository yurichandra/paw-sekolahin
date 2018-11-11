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
            'role' => $user->role->name,
            'personal' => $this->personal($user),
        ];
    }

    public function personal(User $user)
    {
        if ($user->personal !== null) {
            return [
                'phoneNumber' => $user->personal->phone_number,
                'identityNumber' => $user->personal->identity_number,
                'photo' => $this->photo($user),
            ];
        }

        return null;
    }

    public function photo(User $user)
    {
        if ($user->personal->photo !== null) {
            return [
                'path' => $user->personal->photo->path,
            ];
        }

        return null;
    }
}
