<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Gate;
use Illuminate\Http\Response;

class AccountManagerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_manager_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.account-manager.index');
    }

    public function create()
    {
        abort_if(Gate::denies('account_manager_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.account-manager.create');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('account_manager_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::find($id);

        return view('taxigo.admin.account-manager.edit', compact('user'));
    }

    public function show($id)
    {
        abort_if(Gate::denies('account_manager_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = User::find($id);
        $user->load('roles');

        return view('taxigo.admin.account-manager.show', compact('user'));
    }
}
