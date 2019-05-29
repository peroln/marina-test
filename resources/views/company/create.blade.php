@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Create new company</h1>
@stop

@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
    {{ method_field('post') }}
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Company Name</label>
      <input name="name" type="text" class="form-control" id="name" placeholder="company name" value="">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Email address</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" value="">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Website</label>
      <input  name="website" type="text" class="form-control" id="website" placeholder="address website" value="">
    </div>

    <div class="form-group">
      <label for="exampleFormControlFile1">Logo file input</label>
      <input name="logo" type="file" class="form-control-file" id="logoFile">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </form>
@stop

@section('css')
  {{--  <link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop

@section('js')
  {{--  <script> console.log('Hi!'); </script>--}}
@stop



