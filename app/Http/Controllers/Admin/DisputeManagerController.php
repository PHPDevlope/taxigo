<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DisputeManagerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dispute_manager_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dispute-manager.index');
    }

    public function create()
    {
        abort_if(Gate::denies('dispute_manager_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.dispute-manager.create');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('dispute_manager_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.dispute-manager.edit', compact('user'));
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('dispute_manager_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        return view('taxigo.admin.dispute-manager.show', compact('user'));
    }
}
