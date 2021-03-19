<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAlternativeRequest;
use App\Http\Requests\StoreAlternativeRequest;
use App\Http\Requests\UpdateAlternativeRequest;
use App\Models\Alternative;
use App\Models\Question;
use App\Models\Theme;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlternativeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('alternative_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alternatives = Alternative::with(['questions', 'themes', 'type', 'difficulty'])->get();

        return view('frontend.alternatives.index', compact('alternatives'));
    }

    public function create()
    {
        abort_if(Gate::denies('alternative_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('question', 'id');

        $themes = Theme::all()->pluck('micro_theme', 'id');

        $types = Question::all()->pluck('questiontype', 'id')->prepend(trans('global.pleaseSelect'), '');

        $difficulties = Question::all()->pluck('difficulty', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.alternatives.create', compact('questions', 'themes', 'types', 'difficulties'));
    }

    public function store(StoreAlternativeRequest $request)
    {
        $alternative = Alternative::create($request->all());
        $alternative->questions()->sync($request->input('questions', []));
        $alternative->themes()->sync($request->input('themes', []));

        return redirect()->route('frontend.alternatives.index');
    }

    public function edit(Alternative $alternative)
    {
        abort_if(Gate::denies('alternative_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('question', 'id');

        $themes = Theme::all()->pluck('micro_theme', 'id');

        $types = Question::all()->pluck('questiontype', 'id')->prepend(trans('global.pleaseSelect'), '');

        $difficulties = Question::all()->pluck('difficulty', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alternative->load('questions', 'themes', 'type', 'difficulty');

        return view('frontend.alternatives.edit', compact('questions', 'themes', 'types', 'difficulties', 'alternative'));
    }

    public function update(UpdateAlternativeRequest $request, Alternative $alternative)
    {
        $alternative->update($request->all());
        $alternative->questions()->sync($request->input('questions', []));
        $alternative->themes()->sync($request->input('themes', []));

        return redirect()->route('frontend.alternatives.index');
    }

    public function show(Alternative $alternative)
    {
        abort_if(Gate::denies('alternative_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alternative->load('questions', 'themes', 'type', 'difficulty');

        return view('frontend.alternatives.show', compact('alternative'));
    }

    public function destroy(Alternative $alternative)
    {
        abort_if(Gate::denies('alternative_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alternative->delete();

        return back();
    }

    public function massDestroy(MassDestroyAlternativeRequest $request)
    {
        Alternative::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
