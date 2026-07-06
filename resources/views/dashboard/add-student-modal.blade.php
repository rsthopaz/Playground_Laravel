
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
            <input type="text" class="form-control" name="name" id="name">
            <span class="text-danger error-text name_error"></span>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Student Reg Number</label>
            <input type="text" class="form-control" name="reg_no" id="reg_no">
            <span class="text-danger error-text reg_no_error"></span>
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Student Profile Image</label>
            <input type="file" class="form-control" name="profile_image" id="profile_image">
            <span class="text-danger error-text profile_image_error"></span>
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