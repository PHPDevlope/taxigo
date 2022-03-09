<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestHistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('request_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.request-history.index');
    }

    public function create()
    {
        abort_if(Gate::denies('request_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.request-history.create');
    }

    public function edit(RequestHistory $requestHistory)
    {
        abort_if(Gate::denies('request_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.request-history.edit', compact('requestHistory'));
    }

    public function show(RequestHistory $requestHistory)
    {
        abort_if(Gate::denies('request_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestHistory->load('userName', 'providerName', 'coupon');

        return view('taxigo.admin.request-history.show', compact('requestHistory'));
    }
}
