@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.theme.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.themes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('micro_theme') ? 'has-error' : '' }}">
                            <label for="micro_theme">{{ trans('cruds.theme.fields.micro_theme') }}</label>
                            <input class="form-control" type="text" name="micro_theme" id="micro_theme" value="{{ old('micro_theme', '') }}">
                            @if($errors->has('micro_theme'))
                                <span class="help-block" role="alert">{{ $errors->first('micro_theme') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.theme.fields.micro_theme_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('macro_theme') ? 'has-error' : '' }}">
                            <label for="macro_theme">{{ trans('cruds.theme.fields.macro_theme') }}</label>
                            <input class="form-control" type="text" name="macro_theme" id="macro_theme" value="{{ old('macro_theme', '') }}">
                            @if($errors->has('macro_theme'))
                                <span class="help-block" role="alert">{{ $errors->first('macro_theme') }}</span>
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