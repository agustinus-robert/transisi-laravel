@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><div class="row">
                        <div class="col-md-10">
                            <h4><i class="fa fa-window-maximize" aria-hidden="true"></i> Dashboard</h4>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Selamat Datang di halaman Admin Silahkan kelola data anda</h5>
                    <hr>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
