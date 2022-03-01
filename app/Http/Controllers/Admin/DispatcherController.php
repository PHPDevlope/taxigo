<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DispatcherController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dispatcher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dispatcher.index');
    }

    public function create()
    {
        abort_if(Gate::denies('dispatcher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.dispatcher.create');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('dispatcher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.dispatcher.edit', compact('user'));
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('dispatcher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('taxigo.admin.dispatcher.show', compact('user'));
    }
}
