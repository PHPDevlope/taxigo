<?php

namespace App\Http\Requests;

use App\Models\PaymentHistory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentHistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('payment_history_edit'),
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
            'transaction' => [
                'string',
                'nullable',
            ],
            'total_amount' => [
                'numeric',
                'nullable',
            ],
            'provider_amount' => [
                'numeric',
                'nullable',
            ],
            'payment_mode' => [
                'string',
                'nullable',
            ],
            'paument_status' => [
                'nullable',
                'in:' . implode(',', array_keys(PaymentHistory::PAUMENT_STATUS_SELECT)),
            ],
        ];
    }
}
