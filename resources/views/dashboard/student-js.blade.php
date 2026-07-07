<script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        $(document).ready(function(){
            // alert();
            $(document).on('submit', '#addStudentForm', function(e){
                e.preventDefault();
                let formData = new FormData(this);

                $('.error-text').text('');
                
                $.ajax({
                    url:"{{route ('student.store')}}",
                    method:"post",
                    data:formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        $('.success_message').text(response.message);
                        $('#addStudentModal').modal('hide');
                        $('#addStudentForm')[0].reset();

                        fetchStudents();

                        setTimeout(function(){
                            $('.success_message').text('');
                        }, 2000);
                    },
                    error:function(err){
                        let errors = err.responseJSON.errors;
                        $.each(errors, function(key, value){
                            $('.'+key+'_error').text(value[0]);
                        });
                    }
                })
            })

            $(document).on('click', '.editBtn', function(e) {

                $('#edit_id').val($(this).data('id'));
                $('#edit_name').val($(this).data('name'));
                $('#edit_reg_no').val($(this).data('reg_no'));

                $('#edit_image_preview').attr(
                    'src',
                    '/uploads/students/' + $(this).data('image')
                );

                $('#editStudentModal').modal('show');
                


            });

            $(document).on('submit', '#editStudentForm', function(e){
                e.preventDefault();
                let formData = new FormData(this);

                $('.error-text').text('');
                
                $.ajax({
                    url:"{{route ('student.update')}}",
                    method:"post",
                    data:formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        $('.success_message').text(response.message);
                        $('#editStudentModal').modal('hide');
                        $('#editStudentForm')[0].reset();

                        fetchStudents();

                        setTimeout(function(){
                            $('.success_message').text('');
                        }, 2000);
                    },
                    error:function(err){
                        let errors = err.responseJSON.errors;
                        $.each(errors, function(key, value){
                            $('.'+key+'_error').text(value[0]);
                        });
                    }
                })
            })

            function fetchStudents()
        {
        $.ajax({
            type: "get",
            url: "{{route('student.fetch')}}",
            // data: "data",
            // dataType: "dataType",
            success: function (response) {
                $('tbody').html(response);
            }
        });
        }

        $(document).on('click', '.deleteBtn', function(){
            let student_id = $(this).data('id');
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
            if (result.isConfirmed){
                 $.ajax({
                    type: "post",
                    url: "{{route ('student.delete')}}",
                    data: {id:student_id},
                    success: function (response) {
                        Swal.fire({

                title: "Deleted!",
                text: "succesed.",
                icon: "success"
            });
            fetchStudents();
                        
                    },
                    error:function(err){
                         Swal.fire({

                title: "Deleted!",
                text: "something went wrong.",
                icon: "error"
            });
                    }
                });
            }
            });
        });

        $(document).on('keyup', '#search', function(){
            let search = $(this).val();

            $.ajax({
                type: "get",
                url: "{{route ('student.search')}}",
                data: {search:search},
                // dataType: "dataType",
                success: function (response) {
                    $('tbody').html(response);
                }
            });
        })

            
        })


        
        

    </script>