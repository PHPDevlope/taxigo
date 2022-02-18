<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-history.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payment_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-history.create');
    }

    public function edit(PaymentHistory $paymentHistory)
    {
        abort_if(Gate::denies('payment_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-history.edit', compact('paymentHistory'));
    }

    public function show(PaymentHistory $paymentHistory)
    {
        abort_if(Gate::denies('payment_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-history.show', compact('paymentHistory'));
    }
}
