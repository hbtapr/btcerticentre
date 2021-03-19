@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.demo.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.demos.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
                            <label class="required" for="question">{{ trans('cruds.demo.fields.question') }}</label>
                            <input class="form-control" type="text" name="question" id="question" value="{{ old('question', '') }}" required>
                            @if($errors->has('question'))
                                <span class="help-block" role="alert">{{ $errors->first('question') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demo.fields.question_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('alt_right') ? 'has-error' : '' }}">
                            <label for="alt_right">{{ trans('cruds.demo.fields.alt_right') }}</label>
                            <input class="form-control" type="text" name="alt_right" id="alt_right" value="{{ old('alt_right', '') }}">
                            @if($errors->has('alt_right'))
                                <span class="help-block" role="alert">{{ $errors->first('alt_right') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demo.fields.alt_right_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('partner_demo') ? 'has-error' : '' }}">
                            <label class="required" for="partner_demo_id">{{ trans('cruds.demo.fields.partner_demo') }}</label>
                            <select class="form-control select2" name="partner_demo_id" id="partner_demo_id" required>
                                @foreach($partner_demos as $id => $partner_demo)
                                    <option value="{{ $id }}" {{ old('partner_demo_id') == $id ? 'selected' : '' }}>{{ $partner_demo }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('partner_demo'))
                                <span class="help-block" role="alert">{{ $errors->first('partner_demo') }}</span>
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