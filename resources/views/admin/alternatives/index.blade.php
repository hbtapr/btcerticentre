@extends('layouts.admin')
@section('content')
<div class="content">
    @can('alternative_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.alternatives.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.alternative.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.alternative.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Alternative">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.alternative.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.alternative.fields.questions') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.alternative.fields.theme') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.alternative.fields.alt_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.alternative.fields.alt_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.alternative.fields.alt_3') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.alternative.fields.alt_4') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.alternative.fields.rightalternative') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.alternative.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.question.fields.questiontype') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.alternative.fields.difficulty') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alternatives as $key => $alternative)
                                    <tr data-entry-id="{{ $alternative->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $alternative->id ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($alternative->questions as $key => $item)
                                                <span class="label label-info label-many">{{ $item->question }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($alternative->themes as $key => $item)
                                                <span class="label label-info label-many">{{ $item->micro_theme }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $alternative->alt_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $alternative->alt_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $alternative->alt_3 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $alternative->alt_4 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $alternative->rightalternative ?? '' }}
                                        </td>
                                        <td>
                                            {{ $alternative->type->questiontype ?? '' }}
                                        </td>
                                        <td>
                                            {{ $alternative->type->questiontype ?? '' }}
                                        </td>
                                        <td>
                                            {{ $alternative->difficulty->difficulty ?? '' }}
                                        </td>
                                        <td>
                                            @can('alternative_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.alternatives.show', $alternative->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('alternative_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.alternatives.edit', $alternative->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('alternative_delete')
                                                <form action="{{ route('admin.alternatives.destroy', $alternative->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('alternative_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.alternatives.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Alternative:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection