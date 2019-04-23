@extends('layouts.master')
@section('title',$job->job_title)
@section('content')

<div class="container-fluid p-5">
    <div class="col-md-4 offset-md-4">
        <form action="{{ Route('post_apply',$job->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="resume">Please Upload Your Resume</label>
            <div class="custom-file" id="resume">
                <input type="file" name="resume" class="custom-file-input" id="customFile" accept="application/pdf">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <br><br>
            <label for="qualification">Qualification</label>
            <select name="qualification_id" id="qualification" class="form-control">
                <option value="">--Select--</option>
                @foreach($qualifications as $qualification)
                <option value="{{ $qualification->id }}">{{ $qualification->qualification }}</option>
                @endforeach
            </select>
            <br>
            <label for="descripiton">Say Something About Yourself</label>
            <textarea name="self" id="description" cols="30" rows="10" class="form-control" placeholder="Something About You"></textarea>
            <br>
            <input type="submit" value="Apply" class="form-control btn btn-success">
        </form>
    </div>
</div>

@stop