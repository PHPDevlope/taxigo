<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDisputeRequestRequest;
use App\Http\Requests\UpdateDisputeRequestRequest;
use App\Http\Resources\Admin\DisputeRequestResource;
use App\Models\DisputeRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DisputeRequestApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dispute_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisputeRequestResource(DisputeRequest::with(['dispute'])->get());
    }

    public function store(StoreDisputeRequestRequest $request)
    {
        $disputeRequest = DisputeRequest::create($request->validated());

        return (new DisputeRequestResource($disputeRequest))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DisputeRequest $disputeRequest)
    {
        abort_if(Gate::denies('dispute_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisputeRequestResource($disputeRequest->load(['dispute']));
    }

    public function update(UpdateDisputeRequestRequest $request, DisputeRequest $disputeRequest)
    {
        $disputeRequest->update($request->validated());

        return (new DisputeRequestResource($disputeRequest))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DisputeRequest $disputeRequest)
    {
        abort_if(Gate::denies('dispute_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disputeRequest->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
