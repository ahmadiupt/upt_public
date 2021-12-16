@extends('layouts.template')

@section('title')
Data Produk
@endsection

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
              <div class="box-header with-border">
                  <h3 class="box-title">Other Filter</h3>
                  <div class="box-tools pull-right">
                    <button type="button" data-widget="collapse" class="btn btn-tool" >
                        <i class="fa fa-minus"></i>
                    </button>
                  </div>
              </div>
              <div class="box-body">
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
              </div>
              <div class="box-footer">

              </div>
          </div>

          <div class="box box-primary">
            <div class="box-header with-border">


            @if(Request::get('keyword'))
                <a class="btn btn-default btn-xs " href="{{ route('produk.index') }}"><span class="fa fa-chevron-left"></span> Back</a>
            @else
                <a class="btn btn-success btn-xs " href="{{ route('produk.create') }}"><span class="glyphicon glyphicon-plus"></span> Create</a>
            @endif
            <div class="box-tools">
                <form method="get" action="{{route('produk.index')}}">
                    <div class="input-group input-group-sm" style="width:220px">
                        <input type="text" class="form-control pull-right" id="keyword" name="keyword" value="{{Request::get('keyword')}}" placeholder="Search by name">
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
                        Hasil Pencarian Produk dengan Keyword : <b>{{ Request::get('keyword') }}</b>
                    </div>
                @endif

                @include('alert.success')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Produk</th>
                            <th>Diskripsi</th>
                            <th>Kategori</th>
                            <th>Total Port</th>
                            <th>Stok</th>
                            <th>Photo Produk</th>
                            <th style="width:11%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produk as $row)
                            <tr>
                                <td>{{ $loop->iteration + ($produk->perpage() * ($produk->currentPage() - 1)) }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->kategori->kategori }}</td>
                                <td>{{ $row->port}}</td>
                                <td>{{ $row->stok}}</td>
                                <td><img class="img-thumbnail" width="100px" src="{{ asset('uploads/'.$row->photo) }}"/></td>
                                <td >
                                <form method="post" action="{{ route('produk.destroy',[$row->id]) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data ini ?')">
                                @csrf
                                {{ method_field('DELETE') }}
                                <a class="btn btn-warning btn-sm" href="{{ route('produk.edit',[$row->id]) }}"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm "><i class="fa fa-trash-o"></i></button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="box-footer  pull-right">
                        {{ $produk->appends(Request::all())->links() }}
                </div>
            </div>
          </div>
        </div>
</div>
@endsection
