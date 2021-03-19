@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.attempt.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.attempts.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('first_at') ? 'has-error' : '' }}">
                            <label for="first_at">{{ trans('cruds.attempt.fields.first_at') }}</label>
                            <input class="form-control datetime" type="text" name="first_at" id="first_at" value="{{ old('first_at') }}">
                            @if($errors->has('first_at'))
                                <span class="help-block" role="alert">{{ $errors->first('first_at') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.attempt.fields.first_at_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('second_at') ? 'has-error' : '' }}">
                            <label for="second_at">{{ trans('cruds.attempt.fields.second_at') }}</label>
                            <input class="form-control datetime" type="text" name="second_at" id="second_at" value="{{ old('second_at') }}">
                            @if($errors->has('second_at'))
                                <span class="help-block" role="alert">{{ $errors->first('second_at') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.attempt.fields.second_at_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('certificates') ? 'has-error' : '' }}">
                            <label for="certificates_id">{{ trans('cruds.attempt.fields.certificates') }}</label>
                            <select class="form-control select2" name="certificates_id" id="certificates_id">
                                @foreach($certificates as $id => $certificates)
                                    <option value="{{ $id }}" {{ old('certificates_id') == $id ? 'selected' : '' }}>{{ $certificates }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('certificates'))
                                <span class="help-block" role="alert">{{ $errors->first('certificates') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.attempt.fields.certificates_helper') }}</span>
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