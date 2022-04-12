<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePeakTimeRequest;
use App\Http\Requests\UpdatePeakTimeRequest;
use App\Http\Resources\Admin\PeakTimeResource;
use App\Models\PeakTime;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PeakTimeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('peak_time_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PeakTimeResource(PeakTime::all());
    }

    public function store(StorePeakTimeRequest $request)
    {
        $peakTime = PeakTime::create($request->validated());

        return (new PeakTimeResource($peakTime))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PeakTime $peakTime)
    {
        abort_if(Gate::denies('peak_time_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PeakTimeResource($peakTime);
    }

    public function update(UpdatePeakTimeRequest $request, PeakTime $peakTime)
    {
        $peakTime->update($request->validated());

        return (new PeakTimeResource($peakTime))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PeakTime $peakTime)
    {
        abort_if(Gate::denies('peak_time_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $peakTime->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
