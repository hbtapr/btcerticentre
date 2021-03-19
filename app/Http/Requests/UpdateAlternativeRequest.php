<?php

namespace App\Http\Requests;

use App\Models\Alternative;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAlternativeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('alternative_edit');
    }

    public function rules()
    {
        return [
            'questions'         => [
                'required',
                'array',
            ],
            'questions.*.id'    => [
                'integer',
                'exists:questions,id',
            ],
            'theme'             => [
                'required',
                'array',
            ],
            'theme.*.id'        => [
                'integer',
                'exists:themes,id',
            ],
            'alt_1'             => [
                'string',
                'required',
            ],
            'alt_2'             => [
                'string',
                'required',
            ],
            'alt_3'             => [
                'string',
                'nullable',
            ],
            'alt_4'             => [
                'string',
                'nullable',
            ],
            'alt_5'             => [
                'string',
                'nullable',
            ],
            'right_alternative' => [
                'string',
                'required',
            ],
            'type_id'           => [
                'integer',
                'exists:questions,id',
                'nullable',
            ],
            'difficulty_id'     => [
                'integer',
                'exists:questions,id',
                'required',
            ],
        ];
    }
}
