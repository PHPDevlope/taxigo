<?php

namespace App\Http\Requests;

use App\Models\RequestHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequestHistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('request_history_create'),
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
            'user_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'provider_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'total_distance' => [
                'string',
                'nullable',
            ],
            'requestHistory.ride_start_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'requestHistory.ride_end_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'otp' => [
                'string',
                'nullable',
            ],
            'pickup_address' => [
                'string',
                'nullable',
            ],
            'drop_address' => [
                'string',
                'nullable',
            ],
            'base_price' => [
                'string',
                'nullable',
            ],
            'distance_price' => [
                'string',
                'nullable',
            ],
            'discount_price' => [
                'string',
                'nullable',
            ],
            'eta_discount_price' => [
                'string',
                'nullable',
            ],
            'tax_price' => [
                'string',
                'nullable',
            ],
            'surge_price' => [
                'string',
                'nullable',
            ],
            'total_amount' => [
                'string',
                'nullable',
            ],
            'coupon_deduction' => [
                'string',
                'nullable',
            ],
            'coupon_id' => [
                'integer',
                'exists:promocodes,id',
                'nullable',
            ],
            'paid_amount' => [
                'string',
                'nullable',
            ],
            'provider_earnings' => [
                'string',
                'nullable',
            ],
            'provider_admin_commission' => [
                'string',
                'nullable',
            ],
            'ride_status' => [
                'nullable',
                'in:' . implode(',', array_keys(RequestHistory::RIDE_STATUS_SELECT)),
            ],
        ];
    }
}
