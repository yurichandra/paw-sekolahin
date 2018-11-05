<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SchoolService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\SchoolTransformer;

class SchoolController extends RestController
{
    protected $transformer = SchoolTransformer::class;

    /**
     * Display a listing of the resource.
     *
     * @param SchoolService $service
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SchoolService $service)
    {
        $model = $service->get();
        $response = $this->generateCollection($model);

        return $this->sendResponse($response);
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
     * @param SchoolService            $service
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SchoolService $service)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'telephone' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'telephone' => $request->telephone,
        ];

        try {
            $school = $service->create($data);
            $response = $this->generateItem($school);

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
    public function show(SchoolService $service, $id)
    {
        try {
            $school = $service->find($id);
            $response = $this->generateItem($school);

            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('school_not_found');
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
    public function update(SchoolService $service, Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'telephone' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'telephone' => $request->telephone,
        ];

        try {
            $school = $service->update($data, $id);

            $response = $this->generateItem($school);

            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('school_not_found');
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
    public function destroy(SchoolService $service, $id)
    {
        try {
            $service->delete($id);

            return response()->json();
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('school_not_found');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
