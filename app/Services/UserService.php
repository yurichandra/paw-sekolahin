<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Events\UserRegistration;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Return collection of users.
     *
     * @param UserRepository $repo
     */
    public function get()
    {
        return $this->repo->get();
    }

    /**
     * Return model of a user.
     *
     * @param UserRepository $repo
     * @param int            $id
     */
    public function find($id)
    {
        return $this->repo->find($id);
    }

    /**
     * Return a created model.
     *
     * @param array $data
     */
    public function create(array $data)
    {
        try {
            DB::transaction(function () use ($data, &$user) {
                $user = User::create($data);
            });

            // event(new UserRegistration($user));

            return $user;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Return an updated model.
     *
     * @param array $data
     * @param int   $id
     */
    public function update(array $data, $id)
    {
        try {
            DB::transaction(function () use ($data, $id, &$user) {
                $user = $this->find($id);
                $user->update($data);
            });

            return $this->find($id);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Delete a model based on id.
     *
     * @param UserRepository $repo
     * @param int            $id
     */
    public function delete($id)
    {
        return $this->repo->destroy($id);
    }
}
