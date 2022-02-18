<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountManager;
use Gate;
use Illuminate\Http\Request;
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

        return view('admin.account-manager.create');
    }

    public function edit(AccountManager $accountManager)
    {
        abort_if(Gate::denies('account_manager_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.account-manager.edit', compact('accountManager'));
    }

    public function show(AccountManager $accountManager)
    {
        abort_if(Gate::denies('account_manager_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.account-manager.show', compact('accountManager'));
    }
}
