@extends('admin.admin_layout.master')
@section('title','Skills')
@section('content')

<div class="container-fluid p-5">
    <div class="card">
        <div class="card-header">
            Companies
            <!-- Button to Open the Modal -->
            <a href="{{ Route('add.company') }}" class="btn btn-primary btn-sm float-right">
                Add
            </a>
        </div>
        <div class="card-body table-responsive admin-table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <td>
                            <img src="/logos/{{ $company->company_logo }}" alt="{{ $company->company_logo }}" width=50>
                        </td>
                        <td>{{ $company->company_name }}</td>
                        <td>{{ $company->company_address }}</td>
                        <td>{{ $company->company_contact }}</td>
                        <td>{{ $company->description }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ Route('edit_company',$company->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ Route('view_company',$company->id) }}" class="btn btn-sm btn-success">View</a>
                                <a href="#" class="btn btn-sm btn-danger delete" id="delete" data-toggle="modal" data-target="#delete_skills" data-id="{{ $company->id }}" data-type="Company">Delete</a>
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