@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h4><i class="fa fa-users" aria-hidden="true"></i> Employes</h4>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-8">
                         <form action="{{ url('import-excel-employee') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <input type="file" name="file" id="file" class="form-control">
                                    </div>


                                    <div class="col-md-6">
                                        <button type="submit" class="btn text-success border-success">Import <i class="fas fa-file-import"></i></button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>

                        <div class="col-md-4 text-right">
                            <a class="btn text-danger border border-danger" href="<?=url('print-employee')?>">Export PDF <i class="fas fa-file-pdf"></i></a>
                            <a class="btn text-primary border border-primary" href="<?=url('employess/create')?>">Add <i class="fa fa-plus" aria-hidden="true"></i></a>                     
                        </div>
                    </div>
                </div>
              

                <div class="card-body">
                    @if (Session::has('message'))
                        
                    <div class="alert alert-success" role="alert">
                        {!! session('message') !!}
                    </div>

                    @endif

                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Employess Name</th>
                                    <th>Company Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                $arr_comp = [];
                                foreach($company as $idex => $vlx){
                                    $arr_comp[$vlx['id']] = $vlx['nama']; 
                                }


                                foreach($employess as $index => $val){ ?>
                                <tr>
                                    <td><?=$index + $employess->firstItem()?></td>
                                    <td><?=$val->nama?></td>
                                    <td><?=$arr_comp[$val->company]?></td>
                                    <td>
                                    <a class="btn text-warning border-warning" href="<?=url('employess/'.$val->id.'/edit')?>"><i class="fas fa-pencil-alt"></i></a>
                                     <form action="{{url('employess')}}/{{$val->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn text-danger border-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                    </td>
                                </tr>
                                <?php 

                                } ?>
                            </tbody>
                        </table>
                        
                        <div class="text-center">
                            {{ $employess->links() }}
                        </div> 
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
