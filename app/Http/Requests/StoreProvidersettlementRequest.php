<?php

namespace App\Http\Requests;

use App\Models\Providersettlement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProvidersettlementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('providersettlement_create'),
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
            'provider_name' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'numeric',
                'nullable',
            ],
            'type' => [
                'nullable',
                'in:' . implode(',', array_keys(Providersettlement::TYPE_SELECT)),
            ],
            'send' => [
                'nullable',
                'in:' . implode(',', array_keys(Providersettlement::SEND_SELECT)),
            ],
        ];
    }
}
