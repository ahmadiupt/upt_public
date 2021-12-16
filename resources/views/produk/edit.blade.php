@extends('layouts.template')

@section('title')
Edit Data Produk
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                 <a href="{{ route('produk.index') }}" class="btn btn-default btn-xs"><span class="fa fa-chevron-left"></span> Back</a>
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('produk.update',[$produk->id]) }}" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">

                     <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Nama Produk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $produk->name }}" placeholder="Masukan nama Produk">
                  </div>
                </div>

                <div class="form-group">
                  <label for="description" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" value="{{ $produk->description }}" placeholder="Masukan Deskripsi,warna,volt">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kategori_id" class="col-sm-2 control-label">Kategori Produk</label>
                  <div class="col-sm-10">
                    <select name="kategori_id" id="kategori_id" class="form-control">
                       @foreach($kategori as $row)
                        <option value="{{ $row->id }}" @if($produk->kategori_id == $row->id) Selected @endif>{{ $row->kategori }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="port" class="col-sm-2 control-label">Jumlah Port</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="port" name="port" value="{{ $produk->port }}" placeholder="Masukan Jumlah Port">
                  </div>
                </div>

                    <div class="form-group">
                        <label for="photo" class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <img class="img-responsive pad "  src="{{ asset('uploads/'.$produk->photo) }}"/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="photo" class="col-sm-2 control-label">Photo Pegawai</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="photo" name="photo" >
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
