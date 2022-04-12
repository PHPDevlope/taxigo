<?php

namespace App\Http\Requests;

use App\Models\PeakTime;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePeakTimeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('peak_time_create'),
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
            'from' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
            'to' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
            'peak_price' => [
                'numeric',
                'nullable',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(PeakTime::STATUS_SELECT)),
            ],
        ];
    }
}
