@extends('admin.admin_layout.master')
@section('title',$company->company_name)
@section('content')

<div class="jumbotron">
    <h4>
        <b>
            <a href="{{ Route('admin_home') }}">Home</a> / 
            <a href="{{ Route('companies') }}">Companies </a> /
            {{ $company->company_name }}
        </b>
    </h4>
</div>

<div class="container-fluid p-5">
    <div class="text-center">
        <img src="/logos/{{ $company->company_logo }}" alt="logo" class="img img-thumbnail" width="200">
        <br>
        <h3>{{ $company->company_name }}</h3>
        <div class="col-md-6 offset-md-3">
            <table class="table table-hover">
                <tr>
                    <th>Address</th>
                    <td>:</td>
                    <td>{{ $company->company_address }}</td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td>:</td>
                    <td>{{ $company->company_contact }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>:</td>
                    <td>{{ $company->description }}</td>
                </tr>
            </table>
            <a href="{{ Route('edit_company',$company->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
        </div>
    </div>
</div>

@stop