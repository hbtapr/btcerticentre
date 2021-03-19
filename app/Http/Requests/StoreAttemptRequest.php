<?php

namespace App\Http\Requests;

use App\Models\Attempt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAttemptRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('attempt_create');
    }

    public function rules()
    {
        return [
            'first_attempt'   => [
                'date_format:' . config('project.datetime_format'),
                'nullable',
            ],
            'second_attempt'  => [
                'date_format:' . config('project.datetime_format'),
                'nullable',
            ],
            'certificates_id' => [
                'integer',
                'exists:certificates,id',
                'nullable',
            ],
        ];
    }
}
