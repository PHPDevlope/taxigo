<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeakTime;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PeakTimeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('peak_time_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.peak-time.index');
    }

    public function create()
    {
        abort_if(Gate::denies('peak_time_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.peak-time.create');
    }

    public function edit(PeakTime $peakTime)
    {
        abort_if(Gate::denies('peak_time_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.peak-time.edit', compact('peakTime'));
    }

    public function show(PeakTime $peakTime)
    {
        abort_if(Gate::denies('peak_time_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.peak-time.show', compact('peakTime'));
    }
}
