<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FleetOwnerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fleet_owner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fleet-owner.index');
    }

    public function create()
    {
        abort_if(Gate::denies('fleet_owner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.fleet-owner.create');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('fleet_owner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.fleet-owner.edit', compact('user'));
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('fleet_owner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('taxigo.admin.fleet-owner.show', compact('user'));
    }
}
