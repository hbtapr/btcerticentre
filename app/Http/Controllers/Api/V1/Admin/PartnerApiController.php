<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Http\Resources\Admin\PartnerResource;
use App\Models\Partner;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PartnerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('partner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartnerResource(Partner::advancedFilter());
    }

    public function store(StorePartnerRequest $request)
    {
        $partner = Partner::create($request->validated());

        return (new PartnerResource($partner))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Partner $partner)
    {
        abort_if(Gate::denies('partner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(Partner $partner)
    {
        abort_if(Gate::denies('partner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PartnerResource($partner);
    }

    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $partner->update($request->validated());

        return (new PartnerResource($partner))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Partner $partner)
    {
        abort_if(Gate::denies('partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new PartnerResource($partner),
            'meta' => [],
        ]);
    }

    public function destroy(Partner $partner)
    {
        abort_if(Gate::denies('partner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partner->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
