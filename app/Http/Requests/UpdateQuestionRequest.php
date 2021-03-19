<?php

namespace App\Http\Requests;

use App\Models\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('question_edit');
    }

    public function rules()
    {
        return [
            'question'      => [
                'string',
                'nullable',
            ],
            'question_type' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'difficulty'    => [
                'string',
                'required',
            ],
            'theme'         => [
                'array',
            ],
            'theme.*.id'    => [
                'integer',
                'exists:themes,id',
            ],
        ];
    }
}
