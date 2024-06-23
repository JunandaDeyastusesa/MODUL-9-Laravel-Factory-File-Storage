@extends('ori_layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center"><br>
        <div class="col-md-4 my-5 bg-light p-4 rounded-3">
            <h2 class="text-center mb-5">Employee data Master</h3>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @endif
                <form class="pb-5 rounded-3" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="mb-2">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Log In</button>
                </form>
        </div>
    </div>
@endsection
