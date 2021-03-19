<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDemoRequest;
use App\Http\Requests\UpdateDemoRequest;
use App\Http\Resources\Admin\DemoResource;
use App\Models\Demo;
use App\Models\Partner;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DemoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('demo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DemoResource(Demo::with(['partnerDemo'])->advancedFilter());
    }

    public function store(StoreDemoRequest $request)
    {
        $demo = Demo::create($request->validated());

        return (new DemoResource($demo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Demo $demo)
    {
        abort_if(Gate::denies('demo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'partner_demo' => Partner::get(['id', 'partner_name']),
            ],
        ]);
    }

    public function show(Demo $demo)
    {
        abort_if(Gate::denies('demo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DemoResource($demo->load(['partnerDemo']));
    }

    public function update(UpdateDemoRequest $request, Demo $demo)
    {
        $demo->update($request->validated());

        return (new DemoResource($demo))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Demo $demo)
    {
        abort_if(Gate::denies('demo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new DemoResource($demo->load(['partnerDemo'])),
            'meta' => [
                'partner_demo' => Partner::get(['id', 'partner_name']),
            ],
        ]);
    }

    public function destroy(Demo $demo)
    {
        abort_if(Gate::denies('demo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
