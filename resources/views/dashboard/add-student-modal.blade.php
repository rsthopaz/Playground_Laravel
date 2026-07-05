
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addModalLabel">Add New Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" id="addStudentForm" enctype="multipart/form-data">
            @csrf
      <div class="modal-body">
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Student Name</label>
            <input type="text" class="form-control" name="student_name" id="student_name">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Student Reg Number</label>
            <input type="text" class="form-control" name="student_reg_number" id="student_reg_number">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Student Profile Image</label>
            <input type="file" class="form-control" name="student_profile_image" id="student_profile_image">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Student</button>
      </div>
      </form>
    </div>
  </div>
</div>