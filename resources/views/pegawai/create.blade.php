@extends('layouts.template')

@section('title')
Tambah Data Pegawai
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                 <a href="{{ route('pegawai.index') }}" class="btn btn-default btn-xs"><span class="fa fa-chevron-left"></span> Back</a>
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('pegawai.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">

                <div class="form-group">
                  <label for="nik" class="col-sm-2 control-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukan Nomor NIK KTP">
                  </div>
                </div>

                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Masukan nama lengkap">
                  </div>
                </div>

                <div class="form-group">
                        <label for="level" class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <select name="jk" id="jk" class="form-control">
                            <option value="pria">Laki-laki</option>
                            <option value="wanita">Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="email" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Masukan email">
                          </div>
                        </div>

                    <div class="form-group">
                    <label for="telp" class="col-sm-2 control-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telp" name="telp" value="{{ old('telp') }}" placeholder="Masukan Nomor Telepon">
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Masukan alamat lengkap">
                    </div>
                    </div>


                  <div class="form-group">
                      <label for="photo" class="col-sm-2 control-label">Photo</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="photo" name="photo"  >
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
