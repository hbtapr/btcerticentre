<?php

namespace App\Http\Requests;

use App\Models\Certificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('certificate_edit');
    }

    public function rules()
    {
        return [
            'cert_pdf'               => [
                'array',
                'required',
            ],
            'cert_pdf.*.id'          => [
                'integer',
                'exists:media,id',
            ],
            'area'                   => [
                'string',
                'required',
            ],
            'minnimum_approval_rate' => [
                'string',
                'required',
            ],
        ];
    }
}
