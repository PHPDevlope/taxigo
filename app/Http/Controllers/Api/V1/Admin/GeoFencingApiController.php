<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGeoFencingRequest;
use App\Http\Requests\UpdateGeoFencingRequest;
use App\Http\Resources\Admin\GeoFencingResource;
use App\Models\GeoFencing;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeoFencingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('geo_fencing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GeoFencingResource(GeoFencing::all());
    }

    public function store(StoreGeoFencingRequest $request)
    {
        $geoFencing = GeoFencing::create($request->validated());

        return (new GeoFencingResource($geoFencing))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GeoFencing $geoFencing)
    {
        abort_if(Gate::denies('geo_fencing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GeoFencingResource($geoFencing);
    }

    public function update(UpdateGeoFencingRequest $request, GeoFencing $geoFencing)
    {
        $geoFencing->update($request->validated());

        return (new GeoFencingResource($geoFencing))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GeoFencing $geoFencing)
    {
        abort_if(Gate::denies('geo_fencing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $geoFencing->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
