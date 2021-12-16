@extends('layouts.template')

@section('title')
Edit Data Kategori
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                 <a href="{{ route('kategori.index') }}" class="btn btn-default btn-xs"><span class="fa fa-chevron-left"></span> Back</a>
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('kategori.update',[$kategori->id]) }}">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">

                <div class="form-group">
                  <label for="kategori" class="col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $kategori->kategori }}" placeholder="Masukan nama kategori">
                  </div>
                </div>

                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" value="{{ $kategori->description }}" placeholder="Masukan Deskripsi">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="tombol" class="btn btn-warning pull-right"><span class="fa fa-edit"> </span> Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>
</div>
@endsection
