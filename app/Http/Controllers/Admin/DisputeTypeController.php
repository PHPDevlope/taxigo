<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DisputeType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DisputeTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dispute_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dispute-type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('dispute_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.dispute-type.create');
    }

    public function edit(DisputeType $disputeType)
    {
        abort_if(Gate::denies('dispute_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.dispute-type.edit', compact('disputeType'));
    }

    public function show(DisputeType $disputeType)
    {
        abort_if(Gate::denies('dispute_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.dispute-type.show', compact('disputeType'));
    }
}
