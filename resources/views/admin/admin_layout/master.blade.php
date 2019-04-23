<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jobs Portal | @yield('title')</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- popper  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</head>
<body>
    @include('admin.partials.nav')
    @yield('content')
    @include('admin.partials.footer')

    <form action="{{ Route('delete') }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <div class="modal fade" id="delete_skills">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="type" id="type" value="Skill">
                        <p class="text-center">
                            Are you sure you want to delete this?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm pull-left">Delete</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- edit -->
    <form action="{{ Route('edit') }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="modal fade" id="edit">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <input type="hidden" name="type" id="edit_type">
                        <input type="hidden" name="attribute" id="attribute">
                        <label for="curr_val" id="label"></label>
                        <input type="text" name="curr_val" id="curr_val" class="form-control form-control-sm">
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm pull-left">Update</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $(document).on("click",".delete",function(){
            $("#id").val($(this).data('id'));
            $("#type").val($(this).data('type'));
        });
        $(document).on("click",".edit",function(){
            $("#edit_id").val($(this).data('id'));
            $("#edit_type").val($(this).data('type'));
            $("#label").html($(this).data('type'));
            $("#attribute").val($(this).data('attribute'));
            $("#curr_val").val($(this).data('value'));
        })
    </script>
</body>
</html>