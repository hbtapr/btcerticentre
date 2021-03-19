<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAttemptRequest;
use App\Http\Requests\StoreAttemptRequest;
use App\Http\Requests\UpdateAttemptRequest;
use App\Models\Attempt;
use App\Models\Certificate;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AttemptsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('attempt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attempts = Attempt::with(['certificates'])->get();

        return view('admin.attempts.index', compact('attempts'));
    }

    public function create()
    {
        abort_if(Gate::denies('attempt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificates = Certificate::all()->pluck('area', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.attempts.create', compact('certificates'));
    }

    public function store(StoreAttemptRequest $request)
    {
        $attempt = Attempt::create($request->all());

        return redirect()->route('admin.attempts.index');
    }

    public function edit(Attempt $attempt)
    {
        abort_if(Gate::denies('attempt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certificates = Certificate::all()->pluck('area', 'id')->prepend(trans('global.pleaseSelect'), '');

        $attempt->load('certificates');

        return view('admin.attempts.edit', compact('certificates', 'attempt'));
    }

    public function update(UpdateAttemptRequest $request, Attempt $attempt)
    {
        $attempt->update($request->all());

        return redirect()->route('admin.attempts.index');
    }

    public function show(Attempt $attempt)
    {
        abort_if(Gate::denies('attempt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attempt->load('certificates');

        return view('admin.attempts.show', compact('attempt'));
    }

    public function destroy(Attempt $attempt)
    {
        abort_if(Gate::denies('attempt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attempt->delete();

        return back();
    }

    public function massDestroy(MassDestroyAttemptRequest $request)
    {
        Attempt::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
