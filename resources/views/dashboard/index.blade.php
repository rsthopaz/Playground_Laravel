<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
  <body>
    <div class="container bg-ligth py-4">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="d-flex justify-content-between">
                <span>
                    <i class="las la-users text-success"></i>Student Management System
                </span>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal" data-bs-whatever="@mdo">Add Student</button>
                </h2>
                <h4 class="text-success my-4 success_message" > </h4>
                <input type="text" name="search" class="form-control my-3" placeholder="Search by student name and reg no">

                <div class="table-data">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Registration Number</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @include('dashboard.student-data')
                        </tbody>
                        </table>
                </div>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
   
    @include('dashboard.add-student-modal');
    @include('dashboard.edit-student-modal');
    @include('dashboard.student-js');

</body>
</html>