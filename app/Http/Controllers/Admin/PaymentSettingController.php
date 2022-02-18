<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentSetting;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentSettingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-setting.index');
    }

    public function create()
    {
        abort_if(Gate::denies('payment_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-setting.create');
    }

    public function edit(PaymentSetting $paymentSetting)
    {
        abort_if(Gate::denies('payment_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-setting.edit', compact('paymentSetting'));
    }

    public function show(PaymentSetting $paymentSetting)
    {
        abort_if(Gate::denies('payment_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment-setting.show', compact('paymentSetting'));
    }
}
