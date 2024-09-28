@extends('layout.template')
@section('title', 'add new Doctor')



@section('content')



<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">@yield('title')</h1>

    </div>

    <div class="card shadow mb-4">

        <div class="card-body">
            @session('error')
            <div class="alert alert-danger">
                Ups Sorry Error, please kindly try again.
            </div>
            @endsession

            <form action="{{url('doctor')}}" method="POST">
                @csrf
                <x-input label="Name" name="name"></x-input>

                <x-input label="Email" name="email"></x-input>

                <x-input label="Phone" name="phone"></x-input>
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="" hidden>-choose-</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <div class="float-end">
                    <br>
                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>

                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive">

    </div>
  </main>

  @endsection
