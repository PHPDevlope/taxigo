<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRatingRequest;
use App\Http\Requests\UpdateUserRatingRequest;
use App\Http\Resources\Admin\UserRatingResource;
use App\Models\UserRating;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserRatingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_rating_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserRatingResource(UserRating::with(['request', 'userName', 'providerName'])->get());
    }

    public function store(StoreUserRatingRequest $request)
    {
        $userRating = UserRating::create($request->validated());

        return (new UserRatingResource($userRating))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UserRating $userRating)
    {
        abort_if(Gate::denies('user_rating_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserRatingResource($userRating->load(['request', 'userName', 'providerName']));
    }

    public function update(UpdateUserRatingRequest $request, UserRating $userRating)
    {
        $userRating->update($request->validated());

        return (new UserRatingResource($userRating))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UserRating $userRating)
    {
        abort_if(Gate::denies('user_rating_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userRating->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
