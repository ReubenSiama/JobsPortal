@extends('admin.admin_layout.master')
@section('title','Skills')
@section('content')

<div class="container-fluid p-5">
    <div class="card">
        <div class="card-header">
            Skills
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#add_skill">
                Add
            </button>
        </div>
        <div class="card-body table-responsive admin-table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Skill Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skills as $skill)
                    <tr>
                        <td>{{ $skill->id }}</td>
                        <td>{{ $skill->skill_name }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#edit" data-id="{{ $skill->id }}" data-attribute="skill_name" data-type="Skill" data-value="{{ $skill->skill_name }}">Edit</a>
                                <!-- <a href="#" class="btn btn-sm btn-success">View</a> -->
                                <a href="#" class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#delete_skills" data-id="{{ $skill->id }}" data-type="Skill">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <form action="/admin/add_skill" method="post">
        @csrf
        <!-- The Modal -->
        <div class="modal fade" id="add_skill">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Skill</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="skill_name">Skill Name</label>
                            <input type="text" name="skill_name" id="skill_name" class="form-control form-control-sm" placeholder="Skill Name">
                            <br>
                            <input type="submit" value="Add Skill" class="btn btn-success btn-sm">
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