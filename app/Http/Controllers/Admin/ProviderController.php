<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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

    public function edit(User $user)
    {
        abort_if(Gate::denies('provider_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.provider.edit', compact('user'));
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('provider_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('taxigo.admin.provider.show', compact('user'));
    }
}
