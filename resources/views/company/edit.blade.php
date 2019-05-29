@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>{{$company->name}}</h1>
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

  <form action="{{ route('company.update',['company' => $company->id]) }}" method="post" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Company Name</label>
      <input name="name" type="text" class="form-control" id="firstName" placeholder="company name" value="{{$company->name}}">
    </div>
    
    <div class="form-group">
      <label for="exampleFormControlInput1">Email address</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" value="{{$company->email}}">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Website</label>
      <input  name="website" type="text" class="form-control" id="website" placeholder="address website" value="{{$company->website}}">
    </div>

    <div class="form-group">
      <img src="{{$company->logo}}" alt="..." class="img-thumbnail">
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



