@extends('layout.template')
@section('title', 'Detail Doctor : '.$doctor->name)



@section('content')



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Doctor : {{$doctor->name}} </h1>



    </div>
    <table class="table table-striped table-sm">

        <tr>
            <th>Email</th>
            <td>{{$doctor->email}}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{$doctor->phone}}</td>
        </tr>
        <tr>
            <th>Gender</th>
            <td>
                @if ($doctor->gender == 'male')
                <span class="badge bg-primary">male</span>

                @else
                <span class="badge bg-secondary">female</span>
                @endif
            </td>
        </tr>
    </table>
    <div class="float-end">
        <a href="{{url('doctor')}}" class="btn btn-primary">back</a>
    </div>

  </main>

  @endsection
