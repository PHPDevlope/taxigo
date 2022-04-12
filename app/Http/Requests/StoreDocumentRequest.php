<?php

namespace App\Http\Requests;

use App\Models\Document;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('document_create'),
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
            'document_name' => [
                'string',
                'nullable',
            ],
            'document_type' => [
                'nullable',
                'in:' . implode(',', array_keys(Document::DOCUMENT_TYPE_SELECT)),
            ],
        ];
    }
}
