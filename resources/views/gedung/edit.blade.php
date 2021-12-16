@extends('layouts.template')

@section('title')
Edit Data Gedung
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
            <form class="form-horizontal" method="post" action="{{ route('gedung.update',[$gedung->id]) }}">
              @csrf
              {{ method_field('PUT') }}
              <div class="box-body">

                <div class="form-group">
                  <label for="namagedung" class="col-sm-2 control-label">Nama Gedung</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namagedung" name="namagedung" value="{{ $gedung->namagedung }}" placeholder="Masukan nama gedung">
                  </div>
                </div>

                <div class="form-group">
                  <label for="detilgedung" class="col-sm-2 control-label">Detail Gedung</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="detilgedung" name="detilgedung" value="{{ $gedung->detilgedung }}" placeholder="Masukan Detail gedung">
                  </div>
                </div>

                 <div class="form-group">
                        <label for="denahgedung" class="col-sm-2 control-label">Denah Gedung</label>
                        <div class="col-sm-10">
                          <select name="denahgedung" id="denahgedung" class="form-control">
                            <option value="Banjarmasin" @if($gedung->denahgedung == "Banjarmasin") Selected @endif >Banjarmasin</option>
                            <option value="Banjarbaru" @if($gedung->denahgedung == "Banjarbaru") Selected @endif >Banjarbaru</option>
                            <option value="Handil Bakti" @if($gedung->denahgedung == "Handil Bakti") Selected @endif >Handil Bakti</option>
                          </select>
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
