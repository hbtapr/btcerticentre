@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.alternative.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.alternatives.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.alternative.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $alternative->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.alternative.fields.questions') }}
                                    </th>
                                    <td>
                                        @foreach($alternative->questions as $key => $questions)
                                            <span class="label label-info">{{ $questions->question }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.alternative.fields.theme') }}
                                    </th>
                                    <td>
                                        @foreach($alternative->themes as $key => $theme)
                                            <span class="label label-info">{{ $theme->micro_theme }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.alternative.fields.alt_1') }}
                                    </th>
                                    <td>
                                        {{ $alternative->alt_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.alternative.fields.alt_2') }}
                                    </th>
                                    <td>
                                        {{ $alternative->alt_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.alternative.fields.alt_3') }}
                                    </th>
                                    <td>
                                        {{ $alternative->alt_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.alternative.fields.alt_4') }}
                                    </th>
                                    <td>
                                        {{ $alternative->alt_4 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.alternative.fields.rightalternative') }}
                                    </th>
                                    <td>
                                        {{ $alternative->rightalternative }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.alternative.fields.type') }}
                                    </th>
                                    <td>
                                        {{ $alternative->type->questiontype ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.alternative.fields.difficulty') }}
                                    </th>
                                    <td>
                                        {{ $alternative->difficulty->difficulty ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.alternatives.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection