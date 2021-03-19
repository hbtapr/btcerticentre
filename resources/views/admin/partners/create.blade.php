@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.partner.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.partners.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('partner_name') ? 'has-error' : '' }}">
                            <label class="required" for="partner_name">{{ trans('cruds.partner.fields.partner_name') }}</label>
                            <input class="form-control" type="text" name="partner_name" id="partner_name" value="{{ old('partner_name', '') }}" required>
                            @if($errors->has('partner_name'))
                                <span class="help-block" role="alert">{{ $errors->first('partner_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.partner_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('partner_address') ? 'has-error' : '' }}">
                            <label class="required" for="partner_address">{{ trans('cruds.partner.fields.partner_address') }}</label>
                            <input class="form-control" type="text" name="partner_address" id="partner_address" value="{{ old('partner_address', '') }}" required>
                            @if($errors->has('partner_address'))
                                <span class="help-block" role="alert">{{ $errors->first('partner_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.partner_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('partner_email') ? 'has-error' : '' }}">
                            <label for="partner_email">{{ trans('cruds.partner.fields.partner_email') }}</label>
                            <input class="form-control" type="email" name="partner_email" id="partner_email" value="{{ old('partner_email') }}">
                            @if($errors->has('partner_email'))
                                <span class="help-block" role="alert">{{ $errors->first('partner_email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.partner.fields.partner_email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('business_number') ? 'has-error' : '' }}">
                            <label class="required" for="business_number">{{ trans('cruds.partner.fields.business_number') }}</label>
                            <input class="form-control" type="number" name="business_number" id="business_number" value="{{ old('business_number', '') }}" step="1" required>
                            @if($errors->has('business_number'))
                                <span class="help-block" role="alert">{{ $errors->first('business_number') }}</span>
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