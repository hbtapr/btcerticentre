@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.clients.update", [$client->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.client.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                            <input class="form-control" type="number" name="phone" id="phone" value="{{ old('phone', $client->phone) }}" step="1" required>
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="socialnumber">{{ trans('cruds.client.fields.socialnumber') }}</label>
                            <input class="form-control" type="number" name="socialnumber" id="socialnumber" value="{{ old('socialnumber', $client->socialnumber) }}" step="1" required>
                            @if($errors->has('socialnumber'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('socialnumber') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.socialnumber_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="client_name">{{ trans('cruds.client.fields.client_name') }}</label>
                            <input class="form-control" type="text" name="client_name" id="client_name" value="{{ old('client_name', $client->client_name) }}" required>
                            @if($errors->has('client_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('client_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.client_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="products">{{ trans('cruds.client.fields.products') }}</label>
                            <input class="form-control" type="number" name="products" id="products" value="{{ old('products', $client->products) }}" step="1" required>
                            @if($errors->has('products'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('products') }}
                                </div>
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