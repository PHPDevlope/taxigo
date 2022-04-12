<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentHistoryRequest;
use App\Http\Requests\UpdatePaymentHistoryRequest;
use App\Http\Resources\Admin\PaymentHistoryResource;
use App\Models\PaymentHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentHistoryResource(PaymentHistory::all());
    }

    public function store(StorePaymentHistoryRequest $request)
    {
        $paymentHistory = PaymentHistory::create($request->validated());

        return (new PaymentHistoryResource($paymentHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PaymentHistory $paymentHistory)
    {
        abort_if(Gate::denies('payment_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentHistoryResource($paymentHistory);
    }

    public function update(UpdatePaymentHistoryRequest $request, PaymentHistory $paymentHistory)
    {
        $paymentHistory->update($request->validated());

        return (new PaymentHistoryResource($paymentHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PaymentHistory $paymentHistory)
    {
        abort_if(Gate::denies('payment_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
