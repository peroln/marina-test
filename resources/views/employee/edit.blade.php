@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>{{$employee->first_name . ' ' . $employee->last_name}}</h1>
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

  <form action="{{ route('employee.update',['employee' => $employee->id]) }}" method="post">
    {{ method_field('PUT') }}
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">First name</label>
      <input name="first_name" type="text" class="form-control" id="firstName" placeholder="first name" value="{{$employee->first_name}}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Last name</label>
      <input name="last_name" type="text" class="form-control" id="lastName" placeholder="last name" value="{{$employee->last_name}}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Company name</label>
      <select name="company_id" class="form-control" id="companyName">
        @foreach($companies as $id => $name)
          <option value="{{$id}}">{{$name}}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Email address</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com" value="{{$employee->email}}">
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Phone number</label>
      <input  name="phone" type="text" class="form-control" id="phone" placeholder="phone number" value="{{$employee->phone}}">
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


