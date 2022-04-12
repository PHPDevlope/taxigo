<?php

namespace App\Http\Requests;

use App\Models\ProviderRating;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProviderRatingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('provider_rating_create'),
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
            'request_id' => [
                'integer',
                'exists:request_histories,id',
                'nullable',
            ],
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
            'rating' => [
                'string',
                'nullable',
            ],
            'providerRating.date_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'comments' => [
                'string',
                'nullable',
            ],
        ];
    }
}
