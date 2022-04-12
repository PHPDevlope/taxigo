<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('user_create'),
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
            'name' => [
                'string',
                'required',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
            'user.mobile_verified_at' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'email' => [
                'email:rfc',
                'required',
                'unique:users,email',
            ],
            'password' => [
                'string',
                'required',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'locale' => [
                'string',
                'nullable',
            ],
            'otp' => [
                'string',
                'nullable',
            ],
            'firebase_token' => [
                'string',
                'nullable',
            ],
            'device_token' => [
                'string',
                'nullable',
            ],
            'device_type' => [
                'nullable',
                'in:' . implode(',', array_keys(User::DEVICE_TYPE_SELECT)),
            ],
            'device' => [
                'string',
                'nullable',
            ],
            'bio' => [
                'string',
                'nullable',
            ],
            'gender' => [
                'nullable',
                'in:' . implode(',', array_keys(User::GENDER_SELECT)),
            ],
            'dob' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'provider_status' => [
                'nullable',
                'in:' . implode(',', array_keys(User::PROVIDER_STATUS_SELECT)),
            ],
        ];
    }
}
