@extends('layouts.template')

@section('title')
Tambah Data Kategori
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
            <form class="form-horizontal" method="post" action="{{ route('kategori.store') }}">
              @csrf
              <div class="box-body">

                <div class="form-group">
                  <label for="kategori" class="col-sm-2 control-label">Nama Kategori</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}" placeholder="Masukan nama kategori">
                  </div>
                </div>

                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" placeholder="Masukan Deskripsi">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="tombol" class="btn btn-info pull-right"><span class="fa fa-save"> </span> Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
        </div>
</div>
@endsection
