@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.theme.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.themes.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="micro_theme">{{ trans('cruds.theme.fields.micro_theme') }}</label>
                            <input class="form-control" type="text" name="micro_theme" id="micro_theme" value="{{ old('micro_theme', '') }}">
                            @if($errors->has('micro_theme'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('micro_theme') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.theme.fields.micro_theme_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="macro_theme">{{ trans('cruds.theme.fields.macro_theme') }}</label>
                            <input class="form-control" type="text" name="macro_theme" id="macro_theme" value="{{ old('macro_theme', '') }}">
                            @if($errors->has('macro_theme'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('macro_theme') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.theme.fields.macro_theme_helper') }}</span>
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