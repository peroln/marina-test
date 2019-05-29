@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Employees</h1>
@stop

@section('content')
  {{--<div class="d-flex p-5 mt-3 bd-highlight">--}}
  <table class="table" id="table">
    <thead>
    <tr>
      <th class="text-center">Id</th>
      <th class="text-center">First Name</th>
      <th class="text-center">Last Name</th>
      <th class="text-center">Company name</th>
      <th class="text-center">Email</th>
      <th class="text-center">Phone</th>
      <th class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)

      <tr class="item{{$item->id}}">
        <td>{{$item->id}}</td>
        <td>{{$item->first_name}}</td>
        <td>{{$item->last_name}}</td>
        <td>{{$item->company->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->phone}}</td>
        <td  class="row">
          <div class="col-md-6">
            <a class="edit-modal btn btn-info" href="{{route('employee.edit',['employee' => $item->id])}}" role="button" data-info="{{$item->id}}"><span class="glyphicon glyphicon-edit"></span> Edit</a>

          </div>
          <div class="col-md-6">
            <form  action="{{route('employee.destroy', ['employee' => $item->id])}}" method="post">
              {{ method_field('DELETE') }}
              @csrf
              <button type="submit" class="delete-modal btn btn-danger">
                <span class="glyphicon glyphicon-trash"></span> Delete
              </button>
            </form>
          </div>


        </td>
      </tr>
    @endforeach
    </tbody>
    {{--</div>--}}
  </table>
  <a class="edit-modal btn btn-primary" href="{{route('employee.create')}}" role="button" data-info="{{$item->id}}"><span class="glyphicon glyphicon-plus"></span> Create</a>
@stop


@section('css')
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@stop

@section('js')
  <!-- Optional JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
          integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
          crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script>
      $(document).ready(function () {
          $('#table').DataTable();
      });
  </script>
@stop



