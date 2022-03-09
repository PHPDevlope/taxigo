<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserRating;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserRatingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_rating_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.user-rating.index');
    }

    public function create()
    {
        abort_if(Gate::denies('user_rating_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.user-rating.create');
    }

    public function edit(UserRating $userRating)
    {
        abort_if(Gate::denies('user_rating_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.user-rating.edit', compact('userRating'));
    }

    public function show(UserRating $userRating)
    {
        abort_if(Gate::denies('user_rating_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userRating->load('request', 'userName', 'providerName');

        return view('taxigo.admin.user-rating.show', compact('userRating'));
    }
}
