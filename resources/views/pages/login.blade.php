@extends('master')

@section('title','Login')
@section('content')
    

    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    <h3 class="text-center">Login</h3>
                        <form action="{{url('login')}}" method="post">
                            @csrf
                            <div class="form-outline mb-4">
                              <label class="form-label" for="form2Example1">Email address</label>
                              <input type="email" id="email" name="email" class="form-control" placeholder="Eneter your email">
                            </div>
                          
                            <!-- Password input -->
                            <div class="form-outline mb-4">
                              <label class="form-label" for="form2Example2">Password</label>
                              <input type="password" id="password" name="password" class="form-control" placeholder="Enetr your password">
                            </div>
                          
                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                              <div class="col d-flex justify-content-center">
                               
                            </div>
                          
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                          </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

@endsection
