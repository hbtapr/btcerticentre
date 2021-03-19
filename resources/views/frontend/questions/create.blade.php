@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.question.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.questions.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="question">{{ trans('cruds.question.fields.question') }}</label>
                            <input class="form-control" type="text" name="question" id="question" value="{{ old('question', '') }}">
                            @if($errors->has('question'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('question') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.question_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="questiontype">{{ trans('cruds.question.fields.questiontype') }}</label>
                            <input class="form-control" type="number" name="questiontype" id="questiontype" value="{{ old('questiontype', '') }}" step="1">
                            @if($errors->has('questiontype'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('questiontype') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.questiontype_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="themes">{{ trans('cruds.question.fields.theme') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="themes[]" id="themes" multiple>
                                @foreach($themes as $id => $theme)
                                    <option value="{{ $id }}" {{ in_array($id, old('themes', [])) ? 'selected' : '' }}>{{ $theme }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('themes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('themes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.theme_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="difficulty">{{ trans('cruds.question.fields.difficulty') }}</label>
                            <input class="form-control" type="text" name="difficulty" id="difficulty" value="{{ old('difficulty', '') }}" required>
                            @if($errors->has('difficulty'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('difficulty') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.question.fields.difficulty_helper') }}</span>
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