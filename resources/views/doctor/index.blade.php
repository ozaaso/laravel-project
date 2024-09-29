@extends('layout.template')
@section('title', 'Edit Doctor')



@section('content')



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">@yield('title')</h1>

    </div>
    
    @session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endsession
    @session('error')
    <div class="alert alert-danger">
        Ups Sorry Error, please kindly try again.
    </div>
    @endsession

    <a href="{{ url('doctor/create') }}" class="btn btn-primary">create</a>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($doctorsku as $doctor)
                <tr>
                    <td>{{ ($doctorsku->currentPage() - 1)*$doctorsku->perPage() + $loop->iteration}}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ $doctor->phone }}</td>
                    <td>
                        <a href="{{ url('doctor/'.$doctor->uuid) }}" class="btn btn-primary">detail</a>
                        <a href="{{ url('doctor/'.$doctor->uuid.'/edit') }}" class="btn btn-warning">edit</a>
                        <form action="{{ url('doctor/'.$doctor->uuid) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">delete</button>
                        </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <!-- Navigasi Pagination -->
      {{ $doctorsku->links() }}
    </div>
  </main>

  @endsection
