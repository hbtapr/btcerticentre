<?php

namespace App\Http\Requests;

use App\Models\Partner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePartnerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('partner_edit');
    }

    public function rules()
    {
        return [
            'partner_name'    => [
                'string',
                'required',
            ],
            'partner_address' => [
                'string',
                'required',
            ],
            'partner_email'   => [
                'string',
                'nullable',
            ],
            'business_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
                'unique:partners,business_number,' . request()->route('partner')->id,
            ],
        ];
    }
}
