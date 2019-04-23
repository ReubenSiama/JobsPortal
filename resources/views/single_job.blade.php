@extends('layouts.master')
@section('title',$job->job_title)
@section('content')

<div class="jumbotron">
    <h4>
        <b>
            {{ $job->job_title }}
        </b>
    </h4>
    <br>
    <a href="{{ Route('apply',[$job->id]) }}" class="btn btn-success">Apply Now</a>
</div>

<div class="container-fluid p-5">
    <b>{{ $job->company->company_name }}</b>
    <br>
    Qualification : 
    <br>
    @foreach($job->qualifications as $qualification)
    &nbsp;&nbsp;&nbsp;&nbsp; {{ $qualification->qualification }} <br>
    @endforeach
    <br>
    <i>
        Job Type : {{ $job->job_type }}
        <br>
        Location : {{ $job->location->location }}
        <br>
        Age Limit : {{ $job->age_limit }}
        <br>
        No of Posts : {{ $job->no_of_post }}
        <br>
        Salary : {{ $job->salary }}
        <br>
    </i>
    <br>
    <p>
        {{ $job->job_description }}
    </p>
    Skills Required : 
    <br>
    @foreach($job->skills as $skill)
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $skill->skill_name }} <br>
    @endforeach
    <br>
    Category :
    <br>
    @foreach($job->categories as $category)
        &nbsp;&nbsp;&nbsp;&nbsp; {{ $category->category_name }} <br>
    @endforeach
    <br>
    Last Date of Submission of Application : {{ date('d-m-Y', strtotime($job->last_date_of_submission)) }}
</div>

@stop