@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.partner.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.partners.update", [$partner->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="partner_name">{{ trans('cruds.partner.fields.partner_name') }}</label>
                            <input class="form-control" type="text" name="partner_name" id="partner_name" value="{{ old('partner_name', $partner->partner_name) }}" required>
                            @if($errors->has('partner_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('partner_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.partner_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="partner_address">{{ trans('cruds.partner.fields.partner_address') }}</label>
                            <input class="form-control" type="text" name="partner_address" id="partner_address" value="{{ old('partner_address', $partner->partner_address) }}" required>
                            @if($errors->has('partner_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('partner_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.partner_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="partner_email">{{ trans('cruds.partner.fields.partner_email') }}</label>
                            <input class="form-control" type="email" name="partner_email" id="partner_email" value="{{ old('partner_email', $partner->partner_email) }}">
                            @if($errors->has('partner_email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('partner_email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.partner_email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="business_number">{{ trans('cruds.partner.fields.business_number') }}</label>
                            <input class="form-control" type="number" name="business_number" id="business_number" value="{{ old('business_number', $partner->business_number) }}" step="1" required>
                            @if($errors->has('business_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('business_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.business_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection