<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DisputeRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DisputeRequestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dispute_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dispute-request.index');
    }

    public function create()
    {
        abort_if(Gate::denies('dispute_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.dispute-request.create');
    }

    public function edit(DisputeRequest $disputeRequest)
    {
        abort_if(Gate::denies('dispute_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.dispute-request.edit', compact('disputeRequest'));
    }

    public function show(DisputeRequest $disputeRequest)
    {
        abort_if(Gate::denies('dispute_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disputeRequest->load('dispute');

        return view('taxigo.admin.dispute-request.show', compact('disputeRequest'));
    }
}
