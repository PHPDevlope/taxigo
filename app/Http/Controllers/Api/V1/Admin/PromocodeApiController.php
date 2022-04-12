<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromocodeRequest;
use App\Http\Requests\UpdatePromocodeRequest;
use App\Http\Resources\Admin\PromocodeResource;
use App\Models\Promocode;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PromocodeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('promocode_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PromocodeResource(Promocode::all());
    }

    public function store(StorePromocodeRequest $request)
    {
        $promocode = Promocode::create($request->validated());

        return (new PromocodeResource($promocode))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Promocode $promocode)
    {
        abort_if(Gate::denies('promocode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PromocodeResource($promocode);
    }

    public function update(UpdatePromocodeRequest $request, Promocode $promocode)
    {
        $promocode->update($request->validated());

        return (new PromocodeResource($promocode))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Promocode $promocode)
    {
        abort_if(Gate::denies('promocode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $promocode->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
