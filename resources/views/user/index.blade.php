
@extends('master')


@section('header')
    {{-- <div style="display:flex;justify-content:center;align-items:center;min-height:100vh;background:rgb(241, 187, 187);">
        <form action="{{route('login.github')}}" >
            @csrf
            <button style="background:rgb(28, 28, 28);padding:10px;color:white;">Login with Github</button>
        </form>
    </div> --}}
    <div class="container">
        <div class="global-container">
            <div class="card login-form">
                <div class="card-body">
                    <h3 class="card-title text-center">Log in to Codepen</h3>
                    <div class="card-text">
                        <!--
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                        <form method="GET" action="{{route('github-redirect')}}">
                            <!-- to error: add class "has-danger" -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <a href="#" style="float:right;font-size:12px;">Forgot password?</a>
                                <input type="password" class="form-control form-control-sm" id="exampleInputPassword1">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">Login with Github</button>
                                </div>
                                {{-- <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </div> --}}
                            </div>
                            
                            <div class="sign-up">
                                Don't have an account? <a href="#">Create One</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop