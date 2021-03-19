@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.alternative.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.alternatives.update", [$alternative->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('questions') ? 'has-error' : '' }}">
                            <label class="required" for="questions">{{ trans('cruds.alternative.fields.questions') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="questions[]" id="questions" multiple required>
                                @foreach($questions as $id => $questions)
                                    <option value="{{ $id }}" {{ (in_array($id, old('questions', [])) || $alternative->questions->contains($id)) ? 'selected' : '' }}>{{ $questions }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('questions'))
                                <span class="help-block" role="alert">{{ $errors->first('questions') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.questions_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('themes') ? 'has-error' : '' }}">
                            <label class="required" for="themes">{{ trans('cruds.alternative.fields.theme') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="themes[]" id="themes" multiple required>
                                @foreach($themes as $id => $theme)
                                    <option value="{{ $id }}" {{ (in_array($id, old('themes', [])) || $alternative->themes->contains($id)) ? 'selected' : '' }}>{{ $theme }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('themes'))
                                <span class="help-block" role="alert">{{ $errors->first('themes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.theme_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('alt_1') ? 'has-error' : '' }}">
                            <label class="required" for="alt_1">{{ trans('cruds.alternative.fields.alt_1') }}</label>
                            <input class="form-control" type="text" name="alt_1" id="alt_1" value="{{ old('alt_1', $alternative->alt_1) }}" required>
                            @if($errors->has('alt_1'))
                                <span class="help-block" role="alert">{{ $errors->first('alt_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.alt_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('alt_2') ? 'has-error' : '' }}">
                            <label class="required" for="alt_2">{{ trans('cruds.alternative.fields.alt_2') }}</label>
                            <input class="form-control" type="text" name="alt_2" id="alt_2" value="{{ old('alt_2', $alternative->alt_2) }}" required>
                            @if($errors->has('alt_2'))
                                <span class="help-block" role="alert">{{ $errors->first('alt_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.alt_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('alt_3') ? 'has-error' : '' }}">
                            <label for="alt_3">{{ trans('cruds.alternative.fields.alt_3') }}</label>
                            <input class="form-control" type="text" name="alt_3" id="alt_3" value="{{ old('alt_3', $alternative->alt_3) }}">
                            @if($errors->has('alt_3'))
                                <span class="help-block" role="alert">{{ $errors->first('alt_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.alt_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('alt_4') ? 'has-error' : '' }}">
                            <label for="alt_4">{{ trans('cruds.alternative.fields.alt_4') }}</label>
                            <input class="form-control" type="text" name="alt_4" id="alt_4" value="{{ old('alt_4', $alternative->alt_4) }}">
                            @if($errors->has('alt_4'))
                                <span class="help-block" role="alert">{{ $errors->first('alt_4') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.alt_4_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rightalternative') ? 'has-error' : '' }}">
                            <label class="required" for="rightalternative">{{ trans('cruds.alternative.fields.rightalternative') }}</label>
                            <input class="form-control" type="text" name="rightalternative" id="rightalternative" value="{{ old('rightalternative', $alternative->rightalternative) }}" required>
                            @if($errors->has('rightalternative'))
                                <span class="help-block" role="alert">{{ $errors->first('rightalternative') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.rightalternative_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label for="type_id">{{ trans('cruds.alternative.fields.type') }}</label>
                            <select class="form-control select2" name="type_id" id="type_id">
                                @foreach($types as $id => $type)
                                    <option value="{{ $id }}" {{ (old('type_id') ? old('type_id') : $alternative->type->id ?? '') == $id ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <span class="help-block" role="alert">{{ $errors->first('type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('difficulty') ? 'has-error' : '' }}">
                            <label class="required" for="difficulty_id">{{ trans('cruds.alternative.fields.difficulty') }}</label>
                            <select class="form-control select2" name="difficulty_id" id="difficulty_id" required>
                                @foreach($difficulties as $id => $difficulty)
                                    <option value="{{ $id }}" {{ (old('difficulty_id') ? old('difficulty_id') : $alternative->difficulty->id ?? '') == $id ? 'selected' : '' }}>{{ $difficulty }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('difficulty'))
                                <span class="help-block" role="alert">{{ $errors->first('difficulty') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.difficulty_helper') }}</span>
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