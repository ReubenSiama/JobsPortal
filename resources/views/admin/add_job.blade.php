@extends('admin.admin_layout.master')
@section('title','Add Job')
@section('content')

<div class="jumbotron">
    <h4>
        <b>
            <a href="{{ Route('admin_home') }}">Home</a> / 
            {{ isset($job) ? 'Edit '.$job->job_title : 'Add Job' }}
        </b>
    </h4>
</div>

<div class="container-fluid p-5">
    <form action="{{ Route('post_job') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if(isset($job))
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="{{ $job->id }}">
        @endif
        <div class="col-md-4 offset-md-4">
            <label for="company_name">Company</label>
            <select name="company_id" id="company_name" class="form-control">
                <option value="">--Select--</option>
                @foreach($companies as $company)
                <option {{ isset($job) ? $company->id == $job->company_id ? 'selected' : '' : '' }} value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
            <br>
            <label for="categories">Categories</label>
            <select name="categories[]" id="categories" class="form-control selectpicker" multiple data-live-search="true">
                @foreach($categories as $category)
                <option {{ isset($job) ? in_array($category->id, $category_ids) ? 'selected' : '' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <label for="address">Location</label>
            <select name="location" id="address" class="form-control">
                <option value="">--Select--</option>
                @foreach($locations as $location)
                <option {{ isset($job) ? $location->id == $job->location_id ? 'selected' : '' : '' }} value="{{ $location->id }}">{{ $location->location }}</option>
                @endforeach
            </select>
            <br>
            <label for="job_title">Job Title</label>
            <input type="text" value="{{ isset($job) ? $job->job_title : '' }}" name="job_title" id="job_title" class="form-control" placeholder="Job Title">
            <br>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="2" rows="2" class="form-control" placeholder="Job Description">{{ isset($job) ? $job->job_description : '' }}</textarea>
            <br>
            <label for="last_date">Last Date of Submission of Application</label>
            <input type="date" name="last_date_of_submission" class="form-control" value="{{ isset($job) ? $job->last_date_of_submission : '' }}">
            <br>
            <label for="skills">Skills</label>
            <select name="skills[]" id="skills" class="form-control selectpicker" multiple data-live-search="true">
                @foreach($skills as $skill)
                <option {{ isset($job) ? in_array($skill->id, $skill_ids) ? 'selected' : '' : '' }} value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <label for="no_of_post">Number of Posts</label>
            <input type="number" value="{{ isset($job) ? $job->no_of_post : '' }}" name="number_of_post" id="no_of_post" class="form-control" min=1 placeholder="Number of Posts">
            <br>
            <label for="age_limit">Age Limit</label>
            <input type="text" name="age_limit" id="age_limit" class="form-control" placeholder="Age Limit" value="{{ isset($job) ? $job->age_limit : '' }}">
            <br>
            <label for="salary">Salary</label>
            <input type="text" name="salary" id="salary" class="form-control" placeholder="Salary" value="{{ isset($job) ? $job->salary : '' }}">
            <br>
            <label for="job_type">Job Type</label>
            <select name="job_type" id="job_type" class="form-control">
                <option value="">--Select--</option>
                <option {{ isset($job) ? $job->job_type == "Part Time" ? 'selected' : '' : '' }} value="Part Time">Part Time</option>
                <option {{ isset($job) ? $job->job_type == "Full Time" ? 'selected' : '' : '' }} value="Full Time">Full Time</option>
            </select>
            <br>
            <label for="qualifications">Qualifications</label>
            <select name="qualifications[]" id="qualifications" class="form-control selectpicker" multiple data-live-search="true">
                @foreach($qualifications as $qualification)
                <option {{ isset($job) ? in_array($qualification->id, $qualification_ids) ? 'selected' : '' : '' }} value="{{ $qualification->id }}">{{ $qualification->qualification }}</option>
                @endforeach
            </select>
            <br>
            <br>
            <input type="submit" value="Add Job" class="btn btn-success">
        </div>
    </form>
</div>

@stop