@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.attempt.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.attempts.update", [$attempt->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="first_at">{{ trans('cruds.attempt.fields.first_at') }}</label>
                            <input class="form-control datetime" type="text" name="first_at" id="first_at" value="{{ old('first_at', $attempt->first_at) }}">
                            @if($errors->has('first_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.attempt.fields.first_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="second_at">{{ trans('cruds.attempt.fields.second_at') }}</label>
                            <input class="form-control datetime" type="text" name="second_at" id="second_at" value="{{ old('second_at', $attempt->second_at) }}">
                            @if($errors->has('second_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('second_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.attempt.fields.second_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="certificates_id">{{ trans('cruds.attempt.fields.certificates') }}</label>
                            <select class="form-control select2" name="certificates_id" id="certificates_id">
                                @foreach($certificates as $id => $certificates)
                                    <option value="{{ $id }}" {{ (old('certificates_id') ? old('certificates_id') : $attempt->certificates->id ?? '') == $id ? 'selected' : '' }}>{{ $certificates }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('certificates'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('certificates') }}
                                </div>
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