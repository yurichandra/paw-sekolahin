<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Transformers\UserTransformer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends RestController
{
    protected $transformer = UserTransformer::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserService $service)
    {
        $response = $service->get();
        $data = $this->generateCollection($response);

        return $this->sendResponse($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param UserService              $service
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UserService $service)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        try {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => 0,
                'token' => Hash::make($request->email),
            ];

            $model = $service->create($data);
            $response = $this->generateItem($model);

            return $this->sendResponse($response, 201);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(UserService $service, $id)
    {
        try {
            $model = $service->find($id);
            $response = $this->generateItem($model);

            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('user_not_found');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserService $service, Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phoneNumber' => 'required',
            'identityNumber' => 'required',
        ]);

        try {
            $data = [
                'name' => $request->name,
                'personal' => [
                    'phone_number' => $request->phoneNumber,
                    'identity_number' => $request->identityNumber,
                ],
            ];

            $model = $service->update($data, $id);
            $response = $this->generateItem($model);

            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('user_not_found');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserService $service, $id)
    {
        try {
            $service->delete($id);

            return response()->json('delete_success');
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('user_not_found');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
