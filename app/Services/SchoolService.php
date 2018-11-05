<?php

namespace App\Services;

use App\Repositories\SchoolRepository;
use Illuminate\Support\Facades\DB;
use App\Models\School;

class SchoolService
{
    /**
     * Get the schools.
     *
     * @param SchoolRepository $repo
     */
    public function get(SchoolRepository $repo)
    {
        return $repo->get();
    }

    /**
     * Get a school.
     *
     * @param SchoolRepository $repo
     * @param [type]           $id
     */
    public function find(SchoolRepository $repo, $id)
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
            DB::transaction(function () use ($data, &$school) {
                $school = School::create($data);
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
            DB::transaction(function () use ($data, $id, &$school) {
                $school = $this->find($id);
                $school->update($data);
            });

            return $school;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Delete a school.
     *
     * @param SchoolRepository $repo
     * @param int              $id
     */
    public function delete(SchoolRepository $repo, $id)
    {
        return $repo->destroy($id);
    }
}
