<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttemptRequest;
use App\Http\Requests\UpdateAttemptRequest;
use App\Http\Resources\Admin\AttemptResource;
use App\Models\Attempt;
use App\Models\Certificate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttemptsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('attempt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AttemptResource(Attempt::with(['certificates'])->advancedFilter());
    }

    public function store(StoreAttemptRequest $request)
    {
        $attempt = Attempt::create($request->validated());

        return (new AttemptResource($attempt))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Attempt $attempt)
    {
        abort_if(Gate::denies('attempt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'certificates' => Certificate::get(['id', 'area']),
            ],
        ]);
    }

    public function show(Attempt $attempt)
    {
        abort_if(Gate::denies('attempt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AttemptResource($attempt->load(['certificates']));
    }

    public function update(UpdateAttemptRequest $request, Attempt $attempt)
    {
        $attempt->update($request->validated());

        return (new AttemptResource($attempt))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Attempt $attempt)
    {
        abort_if(Gate::denies('attempt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new AttemptResource($attempt->load(['certificates'])),
            'meta' => [
                'certificates' => Certificate::get(['id', 'area']),
            ],
        ]);
    }

    public function destroy(Attempt $attempt)
    {
        abort_if(Gate::denies('attempt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $attempt->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
