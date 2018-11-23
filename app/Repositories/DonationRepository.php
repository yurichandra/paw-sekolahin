<?php

namespace App\Repositories;

use App\Models\Donation;
use App\Models\User;

class DonationRepository extends BaseRepository
{
    protected $model = Donation::class;

    public function findByUser($id)
    {
        $user = User::find($id);

        return $user->donations;
    }
}
