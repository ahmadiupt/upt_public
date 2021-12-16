@extends('layouts.template')

@section('title')
Tambah Denah Gedung
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                 <a href="{{ route('gedung.index') }}" class="btn btn-default btn-xs"><span class="fa fa-chevron-left"></span> Back</a>
                @include('alert.error')
            </div>
            <div class="box-body">
            <form class="form-horizontal" method="post" action="{{ route('gedung.store') }}">
              @csrf
              <div class="box-body">

                <div class="form-group">
                  <label for="namagedung" class="col-sm-2 control-label">Nama Gedung</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namagedung" name="namagedung" value="{{ old('namagedung') }}" placeholder="Masukan nama gedung">
                  </div>
                </div>

                <div class="form-group">
                  <label for="detilgedung" class="col-sm-2 control-label">Detail Gedung</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="detilgedung" name="detilgedung" value="{{ old('detilgedung') }}" placeholder="Masukan Detail gedung">
                  </div>
                </div>


                <div class="form-group">
                        <label for="denahgedung" class="col-sm-2 control-label">Level</label>
                        <div class="col-sm-10">
                          <select name="denahgedung" id="denahgedung" class="form-control">
                            <option value="Banjarmasin">Banjarmasin</option>
                            <option value="Banjarbaru">Banjarbaru</option>
                            <option value="Handil Bakti">Handil Bakti</option>
                          </select>
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
