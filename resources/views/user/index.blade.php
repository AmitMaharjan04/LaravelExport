
@extends('master')

@section('header')
    <div class="container">
        <div class="card login-form w-50">
            <div class="card-body">
                <h3 class="card-title text-center">Laravel Assessment Test</h3>
                <div class="card-text">
                    <form method="GET" action="{{route('github-redirect')}}">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-secondary btn-block">
                                    <img src="{{asset('images/github1.png')}}" class="w-6 p-1 text-white" style="height: 40px;">
                                    <span>Login with GitHub</span>
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop