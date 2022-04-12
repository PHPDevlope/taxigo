<?php

namespace App\Http\Requests;

use App\Models\GeoFencing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGeoFencingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('geo_fencing_create'),
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
            'city_name' => [
                'string',
                'nullable',
            ],
            'distance' => [
                'string',
                'nullable',
            ],
            'distance_price' => [
                'string',
                'nullable',
            ],
            'city_limits' => [
                'string',
                'nullable',
            ],
            'minute_price' => [
                'string',
                'nullable',
            ],
            'pricing_logic' => [
                'nullable',
                'in:' . implode(',', array_keys(GeoFencing::PRICING_LOGIC_SELECT)),
            ],
            'hour_price' => [
                'string',
                'nullable',
            ],
            'base_price' => [
                'string',
                'nullable',
            ],
            'base_distance' => [
                'string',
                'nullable',
            ],
            'unit_time_pricing' => [
                'string',
                'nullable',
            ],
            'unit_distance_price' => [
                'string',
                'nullable',
            ],
            'seat_capacity' => [
                'string',
                'nullable',
            ],
            'waive_off_minutes' => [
                'string',
                'nullable',
            ],
            'per_minute_fare' => [
                'string',
                'nullable',
            ],
            'night_fare' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(GeoFencing::STATUS_SELECT)),
            ],
        ];
    }
}
