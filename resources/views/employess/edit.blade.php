@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h4><i class="fa fa-users" aria-hidden="true"></i> Employes</h4>
                        </div>

                        <div class="col-md-4 text-right">
                            <h4><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit Data</h4>
                        </div>
                    </div>
                </div>

                <form action="{{url('employess')}}/{{$id}}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $employess->nama) }}" />

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $employess->email) }}" />

                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Company</label>
                            

                            <select name="company" id="company" class="form-control @error('company') is-invalid @enderror">
                                <option value="">Choose Your Company</option>
                            </select>

                            @error('company')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="submit" class="btn btn-warning" value="Edit"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function() {

        $('#company').select2({
              ajax: {
                url: "{{url('/company/select')}}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term || '', // search term
                        page: params.page || 1,
                    };
                },
                processResults: function (data, params) {
                  params.page = params.page || 1;

                  return {
                        results: $.map(data.data, function (item) { return {id: item.id, text: item.nama}}),
                        pagination: {
                            more:(params.page * 5) < data.total
                        }
                    }
                },
                cache: true,
              }
        });

        $("#company").select2("trigger", "select", {data: { id: "{{$employess->company ?? ''}}", text: '{{$company->nama ?? ''}}'} 
        });
    });
</script>

@endsection
