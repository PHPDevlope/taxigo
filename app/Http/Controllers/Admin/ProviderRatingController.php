<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProviderRating;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProviderRatingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('provider_rating_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provider-rating.index');
    }

    public function create()
    {
        abort_if(Gate::denies('provider_rating_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provider-rating.create');
    }

    public function edit(ProviderRating $providerRating)
    {
        abort_if(Gate::denies('provider_rating_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provider-rating.edit', compact('providerRating'));
    }

    public function show(ProviderRating $providerRating)
    {
        abort_if(Gate::denies('provider_rating_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $providerRating->load('request', 'userName', 'providerName');

        return view('admin.provider-rating.show', compact('providerRating'));
    }
}
