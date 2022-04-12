<?php

namespace App\Http\Requests;

use App\Models\ServiceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServiceTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('service_type_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'service_name' => [
                'string',
                'nullable',
            ],
            'provider_name' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'outstation_oneway_price' => [
                'numeric',
                'nullable',
            ],
            'outstation_roundtrip_price' => [
                'numeric',
                'nullable',
            ],
            'driver_bata' => [
                'numeric',
                'nullable',
            ],
            'rental_per_hour' => [
                'string',
                'nullable',
            ],
            'peak_time' => [
                'array',
            ],
            'peak_time.*.id' => [
                'integer',
                'exists:peak_times,id',
            ],
            'night_fare' => [
                'string',
                'nullable',
            ],
            'geo_fencing' => [
                'array',
            ],
            'geo_fencing.*.id' => [
                'integer',
                'exists:geo_fencings,id',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(ServiceType::STATUS_SELECT)),
            ],
        ];
    }
}
