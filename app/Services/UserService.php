<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Token;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;

class UserService
{
    protected $repo;

    public function __construct()
    {
        $this->repo = new UserRepository;
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

                $personal = [
                    'photo_id' => null,
                    'phone_number' => null,
                    'identity_number' => null,
                ];

                $user->tokens()->create($data['token']);
                $user->personal()->create($personal);
            });

            Mail::to($user->email)
            ->send(new UserRegistered($user));

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
        $token = Token::where('email', $token)->first();

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

        if (!$user) {
            throw \Exception;
        }

        return password_verify($password, $user->password) ? $user : null;
    }
}
