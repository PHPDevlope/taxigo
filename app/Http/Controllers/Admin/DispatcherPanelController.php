<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DispatcherPanelController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dispatcher-panel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dispatcher-panel.index');
    }

    public function create()
    {
        abort_if(Gate::denies('dispatcher-panel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.dispatcher-panel.create');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('dispatcher-panel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::find($id);

        return view('taxigo.admin.dispatcher-panel.edit', compact('user'));
    }

    public function show($id)
    {
        abort_if(Gate::denies('dispatcher-panel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::find($id);
        $user->load('roles');

        return view('taxigo.admin.dispatcher-panel.show', compact('user'));
    }
}
