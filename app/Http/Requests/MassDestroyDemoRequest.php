<?php

namespace App\Http\Requests;

use App\Models\Demo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDemoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('demo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:demos,id',
        ];
    }
}
