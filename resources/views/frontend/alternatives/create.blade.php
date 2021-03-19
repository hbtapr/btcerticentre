@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.alternative.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.alternatives.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="questions">{{ trans('cruds.alternative.fields.questions') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="questions[]" id="questions" multiple required>
                                @foreach($questions as $id => $questions)
                                    <option value="{{ $id }}" {{ in_array($id, old('questions', [])) ? 'selected' : '' }}>{{ $questions }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('questions'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('questions') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.questions_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="themes">{{ trans('cruds.alternative.fields.theme') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="themes[]" id="themes" multiple required>
                                @foreach($themes as $id => $theme)
                                    <option value="{{ $id }}" {{ in_array($id, old('themes', [])) ? 'selected' : '' }}>{{ $theme }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('themes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('themes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.theme_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="alt_1">{{ trans('cruds.alternative.fields.alt_1') }}</label>
                            <input class="form-control" type="text" name="alt_1" id="alt_1" value="{{ old('alt_1', '') }}" required>
                            @if($errors->has('alt_1'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('alt_1') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.alt_1_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="alt_2">{{ trans('cruds.alternative.fields.alt_2') }}</label>
                            <input class="form-control" type="text" name="alt_2" id="alt_2" value="{{ old('alt_2', '') }}" required>
                            @if($errors->has('alt_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('alt_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.alt_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="alt_3">{{ trans('cruds.alternative.fields.alt_3') }}</label>
                            <input class="form-control" type="text" name="alt_3" id="alt_3" value="{{ old('alt_3', '') }}">
                            @if($errors->has('alt_3'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('alt_3') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.alt_3_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="alt_4">{{ trans('cruds.alternative.fields.alt_4') }}</label>
                            <input class="form-control" type="text" name="alt_4" id="alt_4" value="{{ old('alt_4', '') }}">
                            @if($errors->has('alt_4'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('alt_4') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.alt_4_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="rightalternative">{{ trans('cruds.alternative.fields.rightalternative') }}</label>
                            <input class="form-control" type="text" name="rightalternative" id="rightalternative" value="{{ old('rightalternative', '') }}" required>
                            @if($errors->has('rightalternative'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rightalternative') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.rightalternative_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="type_id">{{ trans('cruds.alternative.fields.type') }}</label>
                            <select class="form-control select2" name="type_id" id="type_id">
                                @foreach($types as $id => $type)
                                    <option value="{{ $id }}" {{ old('type_id') == $id ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.alternative.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="difficulty_id">{{ trans('cruds.alternative.fields.difficulty') }}</label>
                            <select class="form-control select2" name="difficulty_id" id="difficulty_id" required>
                                @foreach($difficulties as $id => $difficulty)
                                    <option value="{{ $id }}" {{ old('difficulty_id') == $id ? 'selected' : '' }}>{{ $difficulty }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('difficulty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('difficulty') }}
                                </div>
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