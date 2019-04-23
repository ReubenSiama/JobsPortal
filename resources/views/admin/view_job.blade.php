@extends('admin.admin_layout.master')
@section('title',$job->job_title)
@section('content')

<div class="container-fluid p-3">
    <div class="card">
        <div class="card-header">
            {{ $job->job_title }}
            <a href="{{ Route('edit_job',$job->id) }}" class="btn btn-success btn-sm float-right"><i class="fa fa-edit"></i> Edit</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    Company : {{ $job->company->company_name }}
                    <br>
                    Location : {{ $job->location->location }}
                    <br>
                    Last Date : {{ date('d/m/Y',strtotime($job->last_date_of_submission)) }}
                    <br>
                    No. of Posts : {{ $job->no_of_post }}
                    <br>
                    Age Limit : {{ $job->age_limit }}
                    <br>
                    Job Description : <br>
                    &nbsp;&nbsp;&nbsp;&nbsp; {{ $job->job_description }}
                    <br>
                    Job Type : {{ $job->job_type }}
                    <br>
                    Salary : {{ $job->salary }}
                    <br>
                </div>
                <div class="col-md-6">
                    Skills : 
                    <br>
                    @foreach($job->skills as $skill)
                    &nbsp;&nbsp;&nbsp;&nbsp; {{ $skill->skill_name }} <br>
                    @endforeach
                    <br>
                    Qualification : 
                    <br>
                    @foreach($job->qualifications as $qualification)
                    &nbsp;&nbsp;&nbsp;&nbsp; {{ $qualification->qualification }} <br>
                    @endforeach
                    <br>
                    Category :
                    <br>
                    @foreach($job->categories as $category)
                    &nbsp;&nbsp;&nbsp;&nbsp; {{ $category->category_name }} <br>
                    @endforeach
                </div>
            </div>
            <br>
            <br>
            <h5 class="text-center">Applicants</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Qualification</th>
                                <th>Date of Birth</th>
                                <th>Skills</th>
                                <th>Resume</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($job->application as $applicant)
                            <tr>
                                <td>{{ $applicant->user->name }}</td>
                                <td>{{ $applicant->qualification->qualification }}</td>
                                <td>{{ $applicant->user->date_of_birth }}</td>
                                <td>
                                    @foreach( $applicant->user->skills as $skill)
                                    {{ $skill->skill_name }},
                                    @endforeach
                                </td>
                                <td>
                                    <a href="/resume/{{ $applicant->resume }}" target="_blank">View</a>
                                </td>
                                <td>{{ $applicant->status }}</td>
                                <td>
                                    <div class="btn-group">
                                    @if($applicant->status == "Pending")
                                        <form action="{{ Route('shortlist',$applicant->id) }}" method="post">
                                            @csrf
                                            <input type="submit" value="Shortlist" class="btn btn-sm border border-success">
                                        </form>
                                        <form action="{{ Route('reject',$applicant->id) }}" method="post">
                                            @csrf
                                            <input type="submit" value="Reject" class="btn btn-sm border border-danger">
                                        </form>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop