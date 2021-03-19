@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.certificate.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.certificates.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('cert_pdf') ? 'has-error' : '' }}">
                            <label class="required" for="cert_pdf">{{ trans('cruds.certificate.fields.cert_pdf') }}</label>
                            <div class="needsclick dropzone" id="cert_pdf-dropzone">
                            </div>
                            @if($errors->has('cert_pdf'))
                                <span class="help-block" role="alert">{{ $errors->first('cert_pdf') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.cert_pdf_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                            <label class="required" for="area">{{ trans('cruds.certificate.fields.area') }}</label>
                            <input class="form-control" type="text" name="area" id="area" value="{{ old('area', '') }}" required>
                            @if($errors->has('area'))
                                <span class="help-block" role="alert">{{ $errors->first('area') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.area_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('minimum_approval_rate') ? 'has-error' : '' }}">
                            <label class="required" for="minimum_approval_rate">{{ trans('cruds.certificate.fields.minimum_approval_rate') }}</label>
                            <input class="form-control" type="number" name="minimum_approval_rate" id="minimum_approval_rate" value="{{ old('minimum_approval_rate', '') }}" step="1" required>
                            @if($errors->has('minimum_approval_rate'))
                                <span class="help-block" role="alert">{{ $errors->first('minimum_approval_rate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.minimum_approval_rate_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.certPdfDropzone = {
    url: '{{ route('admin.certificates.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="cert_pdf"]').remove()
      $('form').append('<input type="hidden" name="cert_pdf" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cert_pdf"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($certificate) && $certificate->cert_pdf)
      var file = {!! json_encode($certificate->cert_pdf) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cert_pdf" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection