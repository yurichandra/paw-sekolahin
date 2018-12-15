<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\InvalidCredentialException;
use App\Exceptions\InvalidTokenException;
use App\Transformers\AuthTokenTransformer;
use App\Services\AuthService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\UserTransformer;

class AuthController extends RestController
{
    protected $transformer = AuthTokenTransformer::class;

    /**
     * Authenticate an user.
     *
     * @param Request $request
     * @param AuthService $service
     *
     * @return Response
     */
    public function authenticate(Request $request, AuthService $service)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $token = $service->authenticate($request->email, $request->password);
            $response = $this->generateItem($token);

            return $this->sendResponse($response);
        } catch (InvalidCredentialException $e) {
            return response()->json($e->getMessage(), 400);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Validate user by a token.
     *
     * @param Request $request
     * @param UserService $service
     *
     * @return Response
     */
    public function validateToken(Request $request, AuthService $service)
    {
        try {
            $header = $request->header('Authorization');
            list($type, $payload) = explode(" ", $header);
            list($email, $password) = explode(":", base64_decode($payload));
            $user = $service->validateToken($email, $password);
            $response = $this->generateItem($user, UserTransformer::class);
            
            return $this->sendResponse($response);
        } catch (InvalidTokenException $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
