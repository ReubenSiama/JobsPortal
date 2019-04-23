@extends('layouts.master')
@section('title','Categories')
@section('content')

<div class="jumbotron">
    <h4>
        <b>
            All Categories
        </b>
    </h4>
</div>
<div class="container-fluid p-3">
    @foreach($categories->chunk(4) as $cat_chunks)
    <div class="row">
        @foreach($cat_chunks as $category)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ Route('category_job',$category->id) }}">{{ $category->category_name }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>
@stop
