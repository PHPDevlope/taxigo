<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DisputeManager;
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

        return view('admin.dispute-manager.create');
    }

    public function edit(DisputeManager $disputeManager)
    {
        abort_if(Gate::denies('dispute_manager_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dispute-manager.edit', compact('disputeManager'));
    }

    public function show(DisputeManager $disputeManager)
    {
        abort_if(Gate::denies('dispute_manager_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dispute-manager.show', compact('disputeManager'));
    }
}
