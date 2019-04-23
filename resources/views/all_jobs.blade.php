@extends('layouts.master')
@section('title','All Jobs')
@section('content')

<div class="jumbotron">
    <h4>
        <b>
            {{ Request::is('view_all') ? 'All Jobs' : Request::is('category_job') ? 'Category' : 'Search Result' }}
        </b>
    </h4>
</div>
<div class="container-fluid">
    <ul class="list-group">
        @foreach($jobs as $job)
        <li class="list-group-item text-center">
            @include('partials.jobs',['job'=>$job])
        </li>
        @endforeach
    </ul>
    <br>
    <div class="text-center">
    @if(Request::is('view_all'))
        {{ $jobs->links() }}
    @endif
    </div>
</div>

@stop