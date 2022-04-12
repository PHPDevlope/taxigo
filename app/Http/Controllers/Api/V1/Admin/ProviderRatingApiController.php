<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProviderRatingRequest;
use App\Http\Requests\UpdateProviderRatingRequest;
use App\Http\Resources\Admin\ProviderRatingResource;
use App\Models\ProviderRating;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProviderRatingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('provider_rating_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProviderRatingResource(ProviderRating::with(['request', 'userName', 'providerName'])->get());
    }

    public function store(StoreProviderRatingRequest $request)
    {
        $providerRating = ProviderRating::create($request->validated());

        return (new ProviderRatingResource($providerRating))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProviderRating $providerRating)
    {
        abort_if(Gate::denies('provider_rating_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProviderRatingResource($providerRating->load(['request', 'userName', 'providerName']));
    }

    public function update(UpdateProviderRatingRequest $request, ProviderRating $providerRating)
    {
        $providerRating->update($request->validated());

        return (new ProviderRatingResource($providerRating))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProviderRating $providerRating)
    {
        abort_if(Gate::denies('provider_rating_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providerRating->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
