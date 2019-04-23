@extends('admin.admin_layout.master')
@section('title','Qualification')
@section('content')

<div class="container-fluid p-5">
    <div class="card">
        <div class="card-header">
            Qualification
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#add_qualification">
                Add
            </button>
        </div>
        <div class="card-body table-responsive admin-table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Qualification</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($qualifications as $qualifications)
                    <tr>
                        <td>{{ $qualifications->id }}</td>
                        <td>{{ $qualifications->qualification }}</td>
                        <td>
                            <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#edit" data-id="{{ $qualifications->id }}" data-attribute="qualification" data-type="Qualification" data-value="{{ $qualifications->qualification }}">Edit</a>
                                <!-- <a href="#" class="btn btn-sm btn-success">View</a> -->
                                <a href="#" class="btn btn-sm btn-danger delete" id="delete" data-toggle="modal" data-target="#delete_skills" data-id="{{ $qualifications->id }}" data-type="Qualification">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <form action="/admin/add_qualification" method="post">
        @csrf
        <!-- The Modal -->
        <div class="modal fade" id="add_qualification">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Qualification</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="qualification">Qualification</label>
                            <input type="text" name="qualification" id="qualification" class="form-control form-control-sm" placeholder="Qualification">
                            <br>
                            <input type="submit" value="Add Qualification" class="btn btn-success btn-sm">
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