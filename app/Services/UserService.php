<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Token;
use App\Jobs\SendEmailRegistration;

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
                $token = [
                    'name' => $data['token'],
                ];

                $personal = [
                    'photo_id' => null,
                    'phone_number' => null,
                    'identity_number' => null,
                ];

                $user->token()->create($token);
                $user->personal()->create($personal);
            });

            dispatch(new SendEmailRegistration($user));

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
                $user->personal()->update($data['personal']);
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

    /**
     * Verify user account.
     *
     * @param string $token
     */
    public function verify($token = null)
    {
        $token = Token::where('name', $token)->first();

        if (!is_null($token)) {
            $user = $token->user;
            $data = [
                'status' => true,
            ];

            $user->update($data);

            return $this->find($user->id);
        }

        return null;
    }

    public function auth(array $data)
    {
        $email = $data['email'];
        $password = $data['password'];

        $user = User::where([
            'email' => $email,
            'status' => true,
        ])->first();

        return password_verify($password, $user->password) ? $user : null;
    }
}
