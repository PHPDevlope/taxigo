<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeoFencing;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GeoFencingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('geo_fencing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.geo-fencing.index');
    }

    public function create()
    {
        abort_if(Gate::denies('geo_fencing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.geo-fencing.create');
    }

    public function edit(GeoFencing $geoFencing)
    {
        abort_if(Gate::denies('geo_fencing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.geo-fencing.edit', compact('geoFencing'));
    }

    public function show(GeoFencing $geoFencing)
    {
        abort_if(Gate::denies('geo_fencing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.geo-fencing.show', compact('geoFencing'));
    }
}
