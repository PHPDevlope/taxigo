<?php

namespace App\Http\Requests;

use App\Models\ProviderLocation;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProviderLocationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'current_longitude' => [
                'string',
                'nullable',
            ],
            'current_latitude' => [
                'string',
                'nullable',
            ],
            'preferred_longitude' => [
                'string',
                'nullable',
            ],
            'preferred_latitude' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(ProviderLocation::STATUS_SELECT)),
            ],
        ];
    }
}
