<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProviderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('provider_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.provider.index');
    }

    public function create()
    {
        abort_if(Gate::denies('provider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.provider.create');
    }

    public function edit(Provider $provider)
    {
        abort_if(Gate::denies('provider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.provider.edit', compact('provider'));
    }

    public function show(Provider $provider)
    {
        abort_if(Gate::denies('provider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.provider.show', compact('provider'));
    }
}
