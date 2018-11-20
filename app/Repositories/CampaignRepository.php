<?php

namespace App\Repositories;

use App\Models\Campaign;
use App\Models\User;

class CampaignRepository extends BaseRepository
{
    protected $model = Campaign::class;

    public function findByUser($id)
    {
        $user = User::find($id);

        return $user->campaigns;
    }
}
