@extends('admin.admin_layout.master')
@section('title','Skills')
@section('content')

<div class="container-fluid p-5">
    <div class="card">
        <div class="card-header">
            Categories
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#category">
                Add
            </button>
        </div>
        <div class="card-body table-responsive admin-table">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#edit" data-id="{{ $category->id }}" data-type="Category" data-attribute="category_name" data-value="{{ $category->category_name }}">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger delete" id="delete" data-toggle="modal" data-target="#delete_skills" data-id="{{ $category->id }}" data-type="Category">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <form action="{{ Route('post_category') }}" method="post">
        @csrf
        <!-- The Modal -->
        <div class="modal fade" id="category">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control form-control-sm" placeholder="Category Name">
                            <br>
                            <input type="submit" value="Add Category" class="btn btn-success btn-sm">
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