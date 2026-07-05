<script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
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
                        $('#addStudentModal')[0].reset();
                    },
                    error:function(err){
                        let errors = err.responseJSON.errors;
                        $.each(errors, function(key, value){
                            $('.'+key+'_error').text(value[0]);
                        });
                    }
                })
            })
        })

    </script>