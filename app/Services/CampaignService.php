<?php

namespace App\Services;

use App\Repositories\CampaignRepository;
use App\Models\Campaign;
use Illuminate\Support\Facades\DB;

class CampaignService
{
    /**
     * Get the campaigns.
     *
     * @param CampaignRepository $repo
     */
    public function get(CampaignRepository $repo)
    {
        return $repo->get();
    }

    /**
     * Get a campaign.
     *
     * @param CampaignRepository $repo
     * @param int                $id
     */
    public function find(CampaignRepository $repo, $id)
    {
        return $repo->find($id);
    }

    /**
     * Create a new school.
     *
     * @param array $data
     */
    public function create(array $data)
    {
        try {
            DB::transaction(function () use ($data, &$campaign) {
                $campaign = Campaign::create($data);
            });

            return $school;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Update a school.
     *
     * @param array $data
     * @param int   $id
     */
    public function update(array $data, $id)
    {
        try {
            DB::transaction(function () use ($data, $id, &$campaign) {
                $campaign = $this->find($id);
                $campaign->update($data);
            });

            return $campaign;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Delete a school.
     *
     * @param CampaignRepository $repo
     * @param int                $id
     */
    public function delete(CampaignRepository $repo, $id)
    {
        return $repo->destroy($id);
    }
}
