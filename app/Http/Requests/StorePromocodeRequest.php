<?php

namespace App\Http\Requests;

use App\Models\Promocode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePromocodeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('promocode_create'),
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
            'promocode' => [
                'string',
                'nullable',
            ],
            'discount' => [
                'string',
                'nullable',
            ],
            'promocodes_use' => [
                'nullable',
                'in:' . implode(',', array_keys(Promocode::PROMOCODES_USE_SELECT)),
            ],
            'use_count' => [
                'string',
                'nullable',
            ],
            'from_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'expiration' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
        ];
    }
}
