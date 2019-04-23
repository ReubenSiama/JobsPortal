@extends('layouts.master')
@section('title','Login')
@section('content')
<div class="jumbotron">
    <h4>
        <b>
            Login
        </b>
    </h4>
    Keep up to date with latest news
</div>
<div class="container-fluid p-5">
    <form action="{{ Route('post_login') }}" method="post">
        @csrf
        <div class="col-md-4 offset-md-4 text-center">
            LOGIN
            <br>
            <br>
            <input type="text" name="name" id="name" class="form-control" placeholder="Username">
            <br>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <br>
            <a href="#" class="float-right">Forgot Password?</a>
            <br>
            <br>
            <input type="submit" value="Login" class="btn btn-success form-control">
        </div>
    </form>
</div>
@stop