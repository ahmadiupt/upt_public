@extends('layouts.template')

@section('title')
Data User
@endsection

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">


            @if(Request::get('keyword'))
                <a class="btn btn-default btn-xs " href="{{ route('user.index') }}"><span class="fa fa-chevron-left"></span> Back</a>
            @else
                <a class="btn btn-success btn-xs " href="{{ route('user.create') }}"><span class="glyphicon glyphicon-plus"></span> Create</a>
            @endif
            <div class="box-tools">
                <form method="get" action="{{route('user.index')}}">
                    <div class="input-group input-group-sm" style="width:220px">
                        <input type="text" class="form-control pull-right" id="keyword" name="keyword" value="{{Request::get('keyword')}}" placeholder="Search">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                </form>
            </div>
            </div>

            <div class="box-body table-responsive no-padding">
                @if(Request::get('keyword'))
                    <div class="alert alert-success alert-block">
                        Hasil Pencarian User dengan Keyword : <b>{{ Request::get('keyword') }}</b>
                    </div>
                @endif

                @include('alert.success')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th style="width:11%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $row)
                            <tr>
                                <td>{{ $loop->iteration + ($user->perpage() * ($user->currentPage() - 1)) }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->level }}</td>
                                <td >

                                <form method="post" action="{{ route('user.destroy',[$row->id]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                @csrf
                                {{ method_field('DELETE') }}
                                <a class="btn btn-warning btn-sm" href="{{ route('user.edit',[$row->id]) }}"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm "><i class="fa fa-trash-o"></i></button>
                                <a class="btn btn-info btn-sm" href="{{ route('user.show',[$row->id]) }}"><i class="fa fa-eye"></i></a>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="box-footer  pull-right">
                        {{ $user->appends(Request::all())->links() }}
                </div>
            </div>
          </div>
        </div>
</div>
@endsection
