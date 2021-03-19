@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.clients.update", [$client->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.client.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="required" for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                            <input class="form-control" type="number" name="phone" id="phone" value="{{ old('phone', $client->phone) }}" step="1" required>
                            @if($errors->has('phone'))
                                <span class="help-block" role="alert">{{ $errors->first('phone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('socialnumber') ? 'has-error' : '' }}">
                            <label class="required" for="socialnumber">{{ trans('cruds.client.fields.socialnumber') }}</label>
                            <input class="form-control" type="number" name="socialnumber" id="socialnumber" value="{{ old('socialnumber', $client->socialnumber) }}" step="1" required>
                            @if($errors->has('socialnumber'))
                                <span class="help-block" role="alert">{{ $errors->first('socialnumber') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.socialnumber_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('client_name') ? 'has-error' : '' }}">
                            <label class="required" for="client_name">{{ trans('cruds.client.fields.client_name') }}</label>
                            <input class="form-control" type="text" name="client_name" id="client_name" value="{{ old('client_name', $client->client_name) }}" required>
                            @if($errors->has('client_name'))
                                <span class="help-block" role="alert">{{ $errors->first('client_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.client_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('products') ? 'has-error' : '' }}">
                            <label class="required" for="products">{{ trans('cruds.client.fields.products') }}</label>
                            <input class="form-control" type="number" name="products" id="products" value="{{ old('products', $client->products) }}" step="1" required>
                            @if($errors->has('products'))
                                <span class="help-block" role="alert">{{ $errors->first('products') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.products_helper') }}</span>
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