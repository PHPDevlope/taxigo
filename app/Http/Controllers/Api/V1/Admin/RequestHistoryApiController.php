<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequestHistoryRequest;
use App\Http\Requests\UpdateRequestHistoryRequest;
use App\Http\Resources\Admin\RequestHistoryResource;
use App\Models\RequestHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('request_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequestHistoryResource(RequestHistory::with(['userName', 'providerName', 'coupon'])->get());
    }

    public function providerRequest(Request $request)
    {
        $provider_id = $request->input('provider_id');
        return [
            'data' => RequestHistory::with(['userName', 'providerName', 'coupon'])->where('provider_name_id', $provider_id)->get(),
        ];
    }

    public function createdRequest(Request $request)
    {
            $created = $request->created_at;

        return [
//            "data" => RequestHistory::with(['userName', 'providerName', 'coupon'])->whereRaw('DATE(created_at) = ?', [$created])->get(),
            "data" => RequestHistory::with(['userName', 'providerName', 'coupon'])->when($created, function($query, $created) {
                            $query->where('created_at', '>=', $created);
                      })->get()
        ];
    }

    public function store(StoreRequestHistoryRequest $request)
    {
        $requestHistory = RequestHistory::create($request->validated());

        return (new RequestHistoryResource($requestHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(RequestHistory $requestHistory)
    {
        abort_if(Gate::denies('request_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RequestHistoryResource($requestHistory->load(['userName', 'providerName', 'coupon']));
    }

    public function update(UpdateRequestHistoryRequest $request, RequestHistory $requestHistory)
    {
        $requestHistory->update($request->validated());

        return (new RequestHistoryResource($requestHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(RequestHistory $requestHistory)
    {
        abort_if(Gate::denies('request_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

