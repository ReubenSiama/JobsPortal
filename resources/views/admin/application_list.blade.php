@extends('admin.admin_layout.master')
@section('title','Application List')
@section('content')

<div class="jumbotron">
    <h4>
        <b>
            <a href="{{ Route('admin_home') }}">Home</a> / 
            Application List
        </b>
    </h4>
</div>

<div class="container-fluid p-5 table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Job</th>
                <th>Name</th>
                <th>Resume</th>
                <th>About</th>
                <th>Qualification</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->job->job_title }}</td>
                    <td>{{ $application->user->name }}</td>
                    <td><a href="/resume/{{ $application->resume }}" target="_blank">View</a></td>
                    <td>{{ $application->self_description }}</td>
                    <td>{{ $application->qualification->qualification }}</td>
                    <td>{{ $application->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop
