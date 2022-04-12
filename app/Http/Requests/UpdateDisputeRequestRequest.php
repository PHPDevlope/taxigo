<?php

namespace App\Http\Requests;

use App\Models\DisputeRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDisputeRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('dispute_request_edit'),
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
            'user_provider' => [
                'string',
                'nullable',
            ],
            'request_detail' => [
                'string',
                'nullable',
            ],
            'dispute_id' => [
                'integer',
                'exists:dispute_types,id',
                'nullable',
            ],
        ];
    }
}
