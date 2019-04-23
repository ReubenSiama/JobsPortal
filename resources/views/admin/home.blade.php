@extends('admin.admin_layout.master')
@section('title','Home')
@section('content')

    <div class="container-fluid p-5">
        <div class="card">
            <div class="card-header">Listed Jobs</div>
            <div class="card-body table-responsive admin-table">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Company Name</th>
                            <th>Job Title</th>
                            <th>Type</th>
                            <th>No of Posts</th>
                            <th>Category</th>
                            <th>No of Applicants</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{ $job->company->company_name }}</td>
                            <td>{{ $job->job_title }}</td>
                            <td>{{ $job->job_type }}</td>
                            <td class="text-center">{{ $job->no_of_post }}</td>
                            <td>
                                @foreach($job->categories as $category)
                                    {{ $category->category_name }} <br>
                                @endforeach
                            </td>
                            <td class="text-center">{{ count($job->application) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ Route('edit_job',$job->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ Route('view_job',$job->id) }}" class="btn btn-sm btn-success">View</a>
                                    <a href="#" class="btn btn-sm btn-danger delete" id="delete" data-toggle="modal" data-target="#delete_skills" data-id="{{ $job->id }}" data-type="Job">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop