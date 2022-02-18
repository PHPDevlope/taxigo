<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promocode;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PromocodeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('promocode_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promocode.index');
    }

    public function create()
    {
        abort_if(Gate::denies('promocode_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promocode.create');
    }

    public function edit(Promocode $promocode)
    {
        abort_if(Gate::denies('promocode_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promocode.edit', compact('promocode'));
    }

    public function show(Promocode $promocode)
    {
        abort_if(Gate::denies('promocode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.promocode.show', compact('promocode'));
    }
}
