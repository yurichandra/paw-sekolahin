<?php

namespace App\Services;

use App\Models\User;
use App\Models\Token;
use Illuminate\Support\Database\ModelNotFoundException;
use App\Exceptions\InvalidCredentialException;
use Carbon\Carbon;
use App\Services\UserService;

class AuthService
{
    protected $user_service;

    public function __construct()
    {
        $this->user_service = new UserService();
    }

    public function authenticate($email, $password)
    {
        try {
            $user = $this->checkUser($email, $password);
            $now = Carbon::now();

            $token = Token::create([
                'user_id' => $user->id,
                'email' => str_random(32),
                'password' => str_random(32),
                'generated_at' => $now,
                'last_used_at' => $now
            ]);

            return $token;
        } catch (InvalidCredentialException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function checkUser($email, $password)
    {
        try {
            $user = User::where('email', $email)->firstOrFail();

            if (!password_verify($password, $user->password)) {
                return new InvalidCredentialException;
            }

            return $user;
        } catch (ModelNotFoundException $e) {
            throw $e;
        }
    }

    public function validateToken($email, $password)
    {
        try {
            $token = Token::where('email', $email)->firstOrFail();
            $user = $this->user_service->find($token->user_id);

            return $user;
        } catch (InvalidTokenException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
