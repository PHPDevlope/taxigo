<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProvidersettlementRequest;
use App\Http\Requests\UpdateProvidersettlementRequest;
use App\Http\Resources\Admin\ProvidersettlementResource;
use App\Models\Providersettlement;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProvidersettlementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('providersettlement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProvidersettlementResource(Providersettlement::all());
    }

    public function store(StoreProvidersettlementRequest $request)
    {
        $providersettlement = Providersettlement::create($request->validated());

        return (new ProvidersettlementResource($providersettlement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Providersettlement $providersettlement)
    {
        abort_if(Gate::denies('providersettlement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProvidersettlementResource($providersettlement);
    }

    public function update(UpdateProvidersettlementRequest $request, Providersettlement $providersettlement)
    {
        $providersettlement->update($request->validated());

        return (new ProvidersettlementResource($providersettlement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Providersettlement $providersettlement)
    {
        abort_if(Gate::denies('providersettlement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providersettlement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
