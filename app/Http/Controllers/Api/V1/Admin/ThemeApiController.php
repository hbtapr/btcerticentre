<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreThemeRequest;
use App\Http\Requests\UpdateThemeRequest;
use App\Http\Resources\Admin\ThemeResource;
use App\Models\Theme;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ThemeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('theme_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ThemeResource(Theme::advancedFilter());
    }

    public function store(StoreThemeRequest $request)
    {
        $theme = Theme::create($request->validated());

        return (new ThemeResource($theme))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Theme $theme)
    {
        abort_if(Gate::denies('theme_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Theme $theme)
    {
        abort_if(Gate::denies('theme_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ThemeResource($theme);
    }

    public function update(UpdateThemeRequest $request, Theme $theme)
    {
        $theme->update($request->validated());

        return (new ThemeResource($theme))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Theme $theme)
    {
        abort_if(Gate::denies('theme_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ThemeResource($theme),
            'meta' => [],
        ]);
    }

    public function destroy(Theme $theme)
    {
        abort_if(Gate::denies('theme_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $theme->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
