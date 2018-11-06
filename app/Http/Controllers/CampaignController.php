<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CampaignService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Transformers\CampaignTransformer;

class CampaignController extends RestController
{
    protected $transformer = CampaignTransformer::class;

    /**
     * Display a listing of the resource.
     *
     * @param CampaignService $service
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CampaignService $service)
    {
        $data = $service->get();
        $response = $this->generateCollection($data);

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
     * @param CampaignService          $service
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CampaignService $service, Request $request)
    {
        $this->validate($request, [
            'userId' => 'required',
            'schoolId' => 'required',
            'title' => 'required',
            'body' => 'required',
            'target' => 'required',
            'date' => 'required',
        ]);

        $data = [
            'user_id' => $request->userId,
            'school_id' => $request->schoolId,
            'title' => $request->title,
            'body' => $request->body,
            'target' => $request->target,
            'raised' => 0,
            'date' => $request->date,
        ];

        try {
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
     * @param CampaignService $service
     * @param int             $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(CampaignService $service, $id)
    {
        try {
            $model = $service->find($id);
            $response = $this->generateItem($model);

            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('campaign_not_found');
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
     * @param CampaignService          $service
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CampaignService $service, Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'date' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'date' => $request->date,
        ];

        try {
            $model = $service->update($data, $id);
            $response = $this->generateItem($model);

            return $this->sendResponse($response);
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CampaignService $service
     * @param int             $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampaignService $service, $id)
    {
        try {
            $service->delete($id);

            return response()->json();
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('campaign_not_found');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
