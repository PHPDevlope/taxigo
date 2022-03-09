<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.service-type.index');
    }

    public function create()
    {
        abort_if(Gate::denies('service_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.service-type.create');
    }

    public function edit(ServiceType $serviceType)
    {
        abort_if(Gate::denies('service_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('taxigo.admin.service-type.edit', compact('serviceType'));
    }

    public function show(ServiceType $serviceType)
    {
        abort_if(Gate::denies('service_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceType->load('peakTime', 'geoFencing');

        return view('taxigo.admin.service-type.show', compact('serviceType'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['service_type_create', 'service_type_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                'image|dimensions:max_width=%s,max_height=%s',
                request()->input('max_width', 100000),
                request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new ServiceType();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
