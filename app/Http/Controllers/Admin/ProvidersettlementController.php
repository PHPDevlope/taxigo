<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Providersettlement;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProvidersettlementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('providersettlement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.providersettlement.index');
    }

    public function create()
    {
        abort_if(Gate::denies('providersettlement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.providersettlement.create');
    }

    public function edit(Providersettlement $providersettlement)
    {
        abort_if(Gate::denies('providersettlement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.providersettlement.edit', compact('providersettlement'));
    }

    public function show(Providersettlement $providersettlement)
    {
        abort_if(Gate::denies('providersettlement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.providersettlement.show', compact('providersettlement'));
    }
}
