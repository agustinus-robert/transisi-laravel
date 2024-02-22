@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                                <h4><i class="fa fa-building" aria-hidden="true"></i> Company</h4>
                        </div>

                        <div class="col-md-4 text-right">
                            <h4><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit Data</h4>
                        </div>
                    </div>
                </div>

                <form action="{{url('company')}}/{{$id}}" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $company->nama) }}" />

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $company->email) }}" />

                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="formFile" class="form-label">Logo</label>
                            <input class="form-control @error('logo') is-invalid @enderror" type="file" name="logo" id="formFile">
                            <i>Jika tidak ingin mengubah gambar silahkan lewati</i>
                            @error('logo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website', $company->website) }}" />

                            @error('website')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <input type="submit" class="btn btn-warning" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
