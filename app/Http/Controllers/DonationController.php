<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DonationService;
use App\Transformers\DonationTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DonationController extends RestController
{
    protected $transformer = DonationTransformer::class;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DonationService $service)
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
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DonationService $service, Request $request)
    {
        $this->validate($request, [
            'userId' => 'required',
            'campaignId' => 'required',
            'amount' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'user_id' => $request->userId,
            'campaign_id' => $request->campaignId,
            'status' => false,
            'amount' => $request->amount,
            'message' => $request->message,
        ];

        try {
            $model = $service->create($data);
            $response = $this->generateItem($model);

            return $this->sendResponse($response);
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
    public function show(DonationService $service, $id)
    {
        try {
            $model = $service->find($id);
            $response = $this->generateItem($model);

            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('donation_not_found');
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
    public function update(DonationService $service, Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);

        $data = [
            'message' => $request->message,
        ];

        try {
            $model = $service->update($data, $id);
            $response = $this->generateItem($model);

            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('donation_not_found');
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
    public function destroy(DonationService $service, $id)
    {
        try {
            $service->delete($id);

            return response()->json();
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('donation_not_found');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function getByUser(DonationService $service, $id)
    {
        try {
            $donations = $service->findByUser($id);
            $response = $this->generateCollection($donations);

            return $this->sendResponse($response);
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('user_not_found');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function uploadProof(Request $request, DonationService $service, $id)
    {
        $this->validate($request, [
            'photo' => 'required',
        ]);

        $path = $request->file('photo')->store('images');

        $data = [
            'user_id' => $id,
            'path' => $path,
        ];

        try {
            $donation = $service->uploadProof($id, $data);
            
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }

    public function verifyDonation(DonationService $service, $id)
    {
        try {
            $service->verify($id);

            return response()->json('success!');
        } catch (ModelNotFoundException $e) {
            return $this->sendNotFoundResponse('donation_not_found');
        } catch (\Exception $e) {
            return $this->sendIseResponse($e->getMessage());
        }
    }
}
