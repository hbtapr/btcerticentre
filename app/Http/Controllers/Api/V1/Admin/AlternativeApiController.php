<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlternativeRequest;
use App\Http\Requests\UpdateAlternativeRequest;
use App\Http\Resources\Admin\AlternativeResource;
use App\Models\Alternative;
use App\Models\Question;
use App\Models\Theme;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlternativeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('alternative_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AlternativeResource(Alternative::with(['questions', 'theme', 'type', 'difficulty'])->advancedFilter());
    }

    public function store(StoreAlternativeRequest $request)
    {
        $alternative = Alternative::create($request->validated());
        $alternative->questions()->sync($request->input('questions.*.id', []));
        $alternative->theme()->sync($request->input('theme.*.id', []));

        return (new AlternativeResource($alternative))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Alternative $alternative)
    {
        abort_if(Gate::denies('alternative_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'questions'  => Question::get(['id', 'question']),
                'theme'      => Theme::get(['id', 'micro_theme']),
                'type'       => Question::get(['id', 'question_type']),
                'difficulty' => Question::get(['id', 'difficulty']),
            ],
        ]);
    }

    public function show(Alternative $alternative)
    {
        abort_if(Gate::denies('alternative_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AlternativeResource($alternative->load(['questions', 'theme', 'type', 'difficulty']));
    }

    public function update(UpdateAlternativeRequest $request, Alternative $alternative)
    {
        $alternative->update($request->validated());
        $alternative->questions()->sync($request->input('questions.*.id', []));
        $alternative->theme()->sync($request->input('theme.*.id', []));

        return (new AlternativeResource($alternative))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Alternative $alternative)
    {
        abort_if(Gate::denies('alternative_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new AlternativeResource($alternative->load(['questions', 'theme', 'type', 'difficulty'])),
            'meta' => [
                'questions'  => Question::get(['id', 'question']),
                'theme'      => Theme::get(['id', 'micro_theme']),
                'type'       => Question::get(['id', 'question_type']),
                'difficulty' => Question::get(['id', 'difficulty']),
            ],
        ]);
    }

    public function destroy(Alternative $alternative)
    {
        abort_if(Gate::denies('alternative_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alternative->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
