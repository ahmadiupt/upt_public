@extends('layouts.template')

@section('title')
Data User
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
            <a href="{{ route('user.index') }}" class="btn btn-default btn-xs"><span class="fa fa-chevron-left"></span> Back</a>
            </div>
            <div class="box-body">

            <table class="table clearfix">
              <tr>
                <td>Username</td>
                <td width="3%">:</td>
                <td>{{ $user->username }}</td>
              </tr>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $user->name }}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $user->email }}</td>
              </tr>
              <tr>
                <td>Level</td>
                <td>:</td>
                <td>{{ $user->level }}</td>
              </tr>
            </table>

            </div>
          </div>
        </div>
</div>
@endsection
