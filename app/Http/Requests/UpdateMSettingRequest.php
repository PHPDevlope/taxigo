<?php

namespace App\Http\Requests;

use App\Models\MSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('m_setting_edit'),
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
            'key' => [
                'string',
                'nullable',
            ],
            'value' => [
                'string',
                'nullable',
            ],
            'data' => [
                'string',
                'nullable',
            ],
            'sub_data' => [
                'string',
                'nullable',
            ],
            'field_1' => [
                'string',
                'nullable',
            ],
            'field_2' => [
                'string',
                'nullable',
            ],
        ];
    }
}
