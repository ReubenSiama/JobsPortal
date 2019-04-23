@extends('layouts.master')
@section('title','Sign Up')
@section('content')
<div class="jumbotron">
    <h4>
        <b>
            Signup
        </b>
    </h4>
    Keep up to date with latest news
</div>
<form action="{{ Route('register') }}" method="post">
    @csrf
    <div class="container-fluid p-3">
        <div class="col-md-4 offset-md-4">
            <h4 class="text-center">
                SIGNUP
            </h4>
            <label for="name">Name</label>
            <input required type="text" name="name" id="name" class="form-control" placeholder="Username">
            <br>
            <label for="email">Email</label>
            <input required type="email" name="email" id="email" class="form-control" placeholder="Email">
            <br>
            <label for="skills">Skills</label>
            <select name="skills[]" id="skills" class="form-control selectpicker" multiple data-live-search="true">
                @foreach($skills as $skill)
                <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <label for="contact">Phone Number</label>
            <input required type="text" name="contact" id="contact" class="form-control" placeholder="Phone Number">
            <br>
            <label for="dob">Date of Birth</label>
            <input required type="date" name="dob" id="dob" class="form-control">
            <br>
            <label for="password">Password</label>
            <input required type="password" name="password" id="password" class="form-control" placeholder="Password">
            <br>
            <input type="submit" value="Signup" class="btn btn-success form-control">
        </div>
    </div>
</form>

@stop