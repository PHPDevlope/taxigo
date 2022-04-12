<?php

namespace App\Http\Requests;

use App\Models\StaticPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStaticPageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('static_page_edit'),
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
            'page_name' => [
                'string',
                'nullable',
            ],
            'content' => [
                'string',
                'nullable',
            ],
            'data' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(StaticPage::STATUS_SELECT)),
            ],
        ];
    }
}
