@extends('admin.admin_layout.master')
@section('title','Add Company')
@section('content')

<div class="jumbotron">
    <h4>
        <b>
            <a href="{{ Route('admin_home') }}">Home</a> / 
            {{ isset($company) ? 'Edit' : 'Add' }}  Company
        </b>
    </h4>
</div>

<div class="container-fluid p-5">
    <form action="/admin/post_add_company" method="post" enctype="multipart/form-data">
        @csrf
        @if(isset($company))
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="{{ $company->id }}">
        @endif
        <div class="col-md-4 offset-md-4">
            <label for="name">Company Name</label>
            <input value="{{ isset($company) ? $company->company_name : '' }}" type="text" name="company_name" id="name" class="form-control" placeholder="Company Name">
            <br>
            <label for="logo">Logo</label>
            <div class="custom-file">
                <input type="file" name="logo" class="custom-file-input" id="customFile" accept="image/*">
                <label class="custom-file-label" for="customFile">Choose file</label>
                @if(isset($company))
                <br><br>
                <p class="text-center">
                    <img src="/logos/{{ $company->company_logo }}" alt="logo" width="100">
                    <br>
                    Logo
                </p>
                @endif
            </div>
            <br>
            <br>
            <label for="address">Address</label>
            <textarea name="address" id="address" cols="2" rows="3" class="form-control" placeholder="Address">{{ isset($company) ? $company->company_address : '' }}</textarea>
            <br>
            <label for="contact">Contact</label>
            <input value="{{ isset($company) ? $company->company_contact : '' }}" type="text" name="contact" id="contact" class="form-control" placeholder="Contact">
            <br>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="2" rows="2" class="form-control" placeholder="Company Description">{{ isset($company) ? $company->description : '' }}</textarea>
            <br>
            <input type="submit" value="{{ isset($company) ? 'Save' : 'Add Company' }}" class="btn btn-success form-control">
        </div>
    </form>
</div>

@stop