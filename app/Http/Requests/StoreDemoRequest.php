<?php

namespace App\Http\Requests;

use App\Models\Demo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDemoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('demo_create');
    }

    public function rules()
    {
        return [
            'question'        => [
                'string',
                'required',
            ],
            'alt_right'       => [
                'string',
                'nullable',
            ],
            'partner_demo_id' => [
                'integer',
                'exists:partners,id',
                'required',
            ],
        ];
    }
}
