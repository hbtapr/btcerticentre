<?php

namespace App\Http\Requests;

use App\Models\Alternative;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAlternativeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('alternative_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:alternatives,id',
        ];
    }
}
