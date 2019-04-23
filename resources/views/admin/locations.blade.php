@extends('admin.admin_layout.master')
@section('title','Locations')
@section('content')

<div class="container-fluid p-5">
    <div class="card">
        <div class="card-header">
            Locations
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#add_location">
                Add
            </button>
        </div>
        <div class="card-body table-responsive admin-table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Location</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->location }}</td>
                        <td>
                            <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#edit" data-attribute="location" data-id="{{ $location->id }}" data-type="Location" data-value="{{ $location->location }}">Edit</a>
                                <!-- <a href="#" class="btn btn-sm btn-success">View</a> -->
                                <a href="#" class="btn btn-sm btn-danger delete" id="delete" data-toggle="modal" data-target="#delete_skills" data-id="{{ $location->id }}" data-type="Location">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    <form action="{{ Route('add_location') }}" method="post">
        @csrf
        <!-- The Modal -->
        <div class="modal fade" id="add_location">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Location</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control form-control-sm" placeholder="Location">
                            <br>
                            <input type="submit" value="Add Location" class="btn btn-success btn-sm">
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
    </form>

@stop