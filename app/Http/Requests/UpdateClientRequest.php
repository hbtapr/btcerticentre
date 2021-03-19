<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_edit');
    }

    public function rules()
    {
        return [
            'email'         => [
                'required',
            ],
            'phone'         => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'social_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
                'unique:clients,social_number,' . request()->route('client')->id,
            ],
            'client_name'   => [
                'string',
                'required',
            ],
            'products'      => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
