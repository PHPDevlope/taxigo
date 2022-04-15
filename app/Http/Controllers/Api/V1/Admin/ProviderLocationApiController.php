<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProviderLocationRequest;
use App\Http\Resources\Admin\ProviderLocationResource;
use App\Models\ProviderLocation;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProviderLocationApiController extends Controller
{
    public function index()
    {
//        abort_if(Gate::denies('request_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProviderLocationResource(ProviderLocation::with(['user'])->where('status', 'active')->get());
    }

    public function createupdate(StoreUpdateProviderLocationRequest $request)
    {
        $providerLocation = ProviderLocation::updateOrcreate([
            'user_id'        => auth()->id(),
        ],[
            'user_id' => auth()->id(),
            'current_latitude' => $request->current_latitude,
            'current_longitude' => $request->current_longitude,
            'preferred_latitude'     => $request->preferred_latitude,
            'preferred_longitude' => $request->preferred_longitude,
            'status' => $request->status,
        ]);

        return (new ProviderLocationResource($providerLocation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProviderLocation $providerLocation)
    {
        return new ProviderLocationResource($providerLocation->load(['user']));
    }


}

