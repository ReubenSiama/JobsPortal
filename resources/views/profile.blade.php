@extends('layouts.master')
@section('title',Auth::user()->name)
@section('content')

<div class="jumbotron">
    <h4>
        <b>
            {{ Auth::user()->name }}
        </b>
    </h4>
</div>
<div class="container-fluid p-3">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Applied Jobs</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach(Auth::user()->applications as $application)
                            <li class="list-group-item">
                                {{ $application->job->job_title }}
                                <span class="float-right">Status : {{ $application->status }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" name="contact" id="contact" class="form-control" value="{{ Auth::user()->contact }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password (Leave blank to keep same)</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn border border-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop