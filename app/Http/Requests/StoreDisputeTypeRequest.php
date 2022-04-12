<?php

namespace App\Http\Requests;

use App\Models\DisputeType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDisputeTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('dispute_type_create'),
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
            'dispute_type' => [
                'nullable',
                'in:' . implode(',', array_keys(DisputeType::DISPUTE_TYPE_SELECT)),
            ],
            'dispute_issue' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(DisputeType::STATUS_SELECT)),
            ],
        ];
    }
}
