<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDemoRequest;
use App\Http\Requests\StoreDemoRequest;
use App\Http\Requests\UpdateDemoRequest;
use App\Models\Demo;
use App\Models\Partner;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('demo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demos = Demo::with(['partner_demo'])->get();

        return view('admin.demos.index', compact('demos'));
    }

    public function create()
    {
        abort_if(Gate::denies('demo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partner_demos = Partner::all()->pluck('partner_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.demos.create', compact('partner_demos'));
    }

    public function store(StoreDemoRequest $request)
    {
        $demo = Demo::create($request->all());

        return redirect()->route('admin.demos.index');
    }

    public function edit(Demo $demo)
    {
        abort_if(Gate::denies('demo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partner_demos = Partner::all()->pluck('partner_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $demo->load('partner_demo');

        return view('admin.demos.edit', compact('partner_demos', 'demo'));
    }

    public function update(UpdateDemoRequest $request, Demo $demo)
    {
        $demo->update($request->all());

        return redirect()->route('admin.demos.index');
    }

    public function show(Demo $demo)
    {
        abort_if(Gate::denies('demo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demo->load('partner_demo');

        return view('admin.demos.show', compact('demo'));
    }

    public function destroy(Demo $demo)
    {
        abort_if(Gate::denies('demo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $demo->delete();

        return back();
    }

    public function massDestroy(MassDestroyDemoRequest $request)
    {
        Demo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
