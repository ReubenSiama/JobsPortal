@extends('layouts.master')
@section('title','Home')
@section('content')

<div class="jumbotron home-content text-center rounded-0 p-6">
    <h2>
        The Easiest Way to Get Your New Job
        <br>
        <small>
            Employment & Career Opportunities
        </small>
    </h2>
    <br>
    <form action="{{ Route('search') }}" method="get">
        <div class="col-md-6 offset-md-3">
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="search" id="search" class="form-control form-control-lg" placeholder="Job title, keywords or company name">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success form-control form-control-lg"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container-fluid">
    <!-- categories -->
    <div class="text-center">
        <h4>
            <b>Categories</b>
        </h4>
    </div>
    @foreach($categories->chunk(4) as $category_chunks)
    <div class="row">
        @foreach($category_chunks as $category)
        <div class="col-md-3">
            <a href="/category/{{ $category->id }}" class="text-decoration-none text-dark">
                <img src="https://www.pinclipart.com/picdir/middle/37-370807_education-clipart-educational-background-transparent-background-education-logo.png" alt="category" class="img img-thumbnail">
                <br>
                <p class="text-center">
                    {{ $category->category_name }}
                </p>
            </a>
        </div>
        @endforeach
    </div>
    @endforeach
    <div class="text-center">
        <a href="{{ Route('all_categories') }}" class="btn border border-danger">Browse All Categories</a>
    </div>
</div>
<!-- register -->
<div class="jumbotron register-home text-center rounded-0 mt-3">
    <h3>
        Get the best jobs based on your skills with
        <br>    
        <small>the best payscale</small>
    </h3>
    <br>
    @if(Auth::guest())
        <a href="/signup" class="btn border border-warning text-light">Register Now</a>
    @endif
</div>
<div class="container-fluid">
    <h3 class="text-center">Latest Jobs</h3>
    <ul class="list-group">
        @foreach($jobs as $job)
        <li class="list-group-item text-center">
            @include('partials.jobs',['job'=>$job])
        </li>
        @endforeach
    </ul>
    <br>
    <div class="text-center">
        <a href="{{ Route('view_all') }}" class="btn border border-danger">View All</a>
    </div>
</div>

@stop