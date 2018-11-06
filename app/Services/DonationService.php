<?php

namespace App\Services;

use App\Repositories\DonationRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Donation;

class DonationService
{
    protected $repo;

    public function __construct(DonationRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Return collection of donations.
     *
     * @param DonationRepository $repo
     */
    public function get()
    {
        return $this->repo->get();
    }

    /**
     * Return a donation.
     *
     * @param DonationRepository $repo
     * @param int                $id
     */
    public function find($id)
    {
        return $this->repo->find($id);
    }

    /**
     * Create a new donation.
     *
     * @param array $data
     */
    public function create(array $data)
    {
        try {
            DB::transaction(function () use ($data, &$donation) {
                $donation = Donation::create($data);
            });

            return $donation;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Update a donation.
     *
     * @param array $data
     * @param int   $id
     */
    public function update(array $data, $id)
    {
        try {
            DB::transaction(function () use ($data, $id, &$donation) {
                $donation = $this->find($id);
                $donation->update($data);
            });

            return $this->find($id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Delete donation.
     *
     * @param DonationRepository $repo
     * @param int                $id
     */
    public function delete($id)
    {
        return $this->repo->destroy($id);
    }
}
