<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreServiceTypeRequest;
use App\Http\Requests\UpdateServiceTypeRequest;
use App\Http\Resources\Admin\ServiceTypeResource;
use App\Models\ServiceType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceTypeApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('service_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceTypeResource(ServiceType::with(['peakTime', 'geoFencing'])->get());
    }

    public function store(StoreServiceTypeRequest $request)
    {
        $serviceType = ServiceType::create($request->validated());
        $serviceType->peakTime()->sync($request->input('peakTime', []));
        $serviceType->geoFencing()->sync($request->input('geoFencing', []));
        if ($request->input('service_type_service_maker_image', false)) {
            $serviceType->addMedia(storage_path('tmp/uploads/' . basename($request->input('service_type_service_maker_image'))))->toMediaCollection('service_type_service_maker_image');
        }

        if ($request->input('service_type_service_image', false)) {
            $serviceType->addMedia(storage_path('tmp/uploads/' . basename($request->input('service_type_service_image'))))->toMediaCollection('service_type_service_image');
        }

        return (new ServiceTypeResource($serviceType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ServiceType $serviceType)
    {
        abort_if(Gate::denies('service_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceTypeResource($serviceType->load(['peakTime', 'geoFencing']));
    }

    public function update(UpdateServiceTypeRequest $request, ServiceType $serviceType)
    {
        $serviceType->update($request->validated());
        $serviceType->peakTime()->sync($request->input('peakTime', []));
        $serviceType->geoFencing()->sync($request->input('geoFencing', []));
        if ($request->input('service_type_service_maker_image', false)) {
            if (!$serviceType->service_type_service_maker_image || $request->input('service_type_service_maker_image') !== $serviceType->service_type_service_maker_image->file_name) {
                if ($serviceType->service_type_service_maker_image) {
                    $serviceType->service_type_service_maker_image->delete();
                }
                $serviceType->addMedia(storage_path('tmp/uploads/' . basename($request->input('service_type_service_maker_image'))))->toMediaCollection('service_type_service_maker_image');
            }
        } elseif ($serviceType->service_type_service_maker_image) {
            $serviceType->service_type_service_maker_image->delete();
        }

        if ($request->input('service_type_service_image', false)) {
            if (!$serviceType->service_type_service_image || $request->input('service_type_service_image') !== $serviceType->service_type_service_image->file_name) {
                if ($serviceType->service_type_service_image) {
                    $serviceType->service_type_service_image->delete();
                }
                $serviceType->addMedia(storage_path('tmp/uploads/' . basename($request->input('service_type_service_image'))))->toMediaCollection('service_type_service_image');
            }
        } elseif ($serviceType->service_type_service_image) {
            $serviceType->service_type_service_image->delete();
        }

        return (new ServiceTypeResource($serviceType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ServiceType $serviceType)
    {
        abort_if(Gate::denies('service_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
