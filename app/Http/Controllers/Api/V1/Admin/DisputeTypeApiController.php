<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDisputeTypeRequest;
use App\Http\Requests\UpdateDisputeTypeRequest;
use App\Http\Resources\Admin\DisputeTypeResource;
use App\Models\DisputeType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DisputeTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dispute_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisputeTypeResource(DisputeType::all());
    }

    public function store(StoreDisputeTypeRequest $request)
    {
        $disputeType = DisputeType::create($request->validated());

        return (new DisputeTypeResource($disputeType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DisputeType $disputeType)
    {
        abort_if(Gate::denies('dispute_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DisputeTypeResource($disputeType);
    }

    public function update(UpdateDisputeTypeRequest $request, DisputeType $disputeType)
    {
        $disputeType->update($request->validated());

        return (new DisputeTypeResource($disputeType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DisputeType $disputeType)
    {
        abort_if(Gate::denies('dispute_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disputeType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
