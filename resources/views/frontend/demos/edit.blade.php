@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.demo.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.demos.update", [$demo->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="question">{{ trans('cruds.demo.fields.question') }}</label>
                            <input class="form-control" type="text" name="question" id="question" value="{{ old('question', $demo->question) }}" required>
                            @if($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.demo.fields.question_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="alt_right">{{ trans('cruds.demo.fields.alt_right') }}</label>
                            <input class="form-control" type="text" name="alt_right" id="alt_right" value="{{ old('alt_right', $demo->alt_right) }}">
                            @if($errors->has('alt_right'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('alt_right') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.demo.fields.alt_right_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="partner_demo_id">{{ trans('cruds.demo.fields.partner_demo') }}</label>
                            <select class="form-control select2" name="partner_demo_id" id="partner_demo_id" required>
                                @foreach($partner_demos as $id => $partner_demo)
                                    <option value="{{ $id }}" {{ (old('partner_demo_id') ? old('partner_demo_id') : $demo->partner_demo->id ?? '') == $id ? 'selected' : '' }}>{{ $partner_demo }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('partner_demo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('partner_demo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.demo.fields.partner_demo_helper') }}</span>
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