<!-- Modal -->
  <div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" onfocus="fillradiobuttons()">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" bg-warning>
          <h5 class="modal-title w-100 text-center" id="exampleModalLabel"> <i>Edit User</i></h5>
          <button type="button" class="close btn btn-warning btn-sm" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('users.update', 'test') }}" enctype="multipart/form-data">
            {{method_field('patch')}}
            @csrf
            <script>
              function fillradiobuttons() {
                var checkedgender = document.getElementById("gender").value; // 1 female , 0 male
                if (checkedgender==0) // if male
                {
                  document.getElementById('genderRadio2').checked = true;
                }
                if (checkedgender==1) // if female
                {
                  document.getElementById('genderRadio1').checked = true;
                }

                var checkedadmin = document.getElementById("is_admin").value; // 1 Admin , 0-NULL User
                if (checkedadmin==1) // if Admin
                {
                  document.getElementById('adminRadio1').checked = true;
                }
                else // if User
                {
                  document.getElementById('adminRadio2').checked = true;
                }
              }
            </script>

          <div class="box-body box-profile" align="center">
            <input type="hidden" name="id" id="id" class="form-control">
            <input type="hidden" class="form-control" id="avatar" name="avatar">
            <input type="hidden" name="gender" id="gender" class="form-control">
            <input type="hidden" name="is_admin" id="is_admin" class="form-control">
          </div>

          <div class="card" align="center">
            <div class="card-body">
                <img src="" id="preview" name="preview" alt="" class="browse" width="100" align="center">
                <input type="file" name="image" id="image" class="file" accept="image/*">
                <small id="categoryHelp" class="form-text text-muted">Klik gambar untuk mengubah</small>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="name" id="name" class="form-control" aria-describedby="categoryHelp" placeholder="Add Name" required="" autofocus="">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user-secret"></i></span>
            </div>
          <input type="text" name="nickname" id="nickname" class="form-control" aria-describedby="categoryHelp" placeholder="Add Nickname" required>
          </div>
          <small id="categoryHelp" class="form-text text-muted">Your Name and Nickname</small>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
                <input type="text" name="email" id="email" class="form-control" aria-describedby="categoryHelp" placeholder="Add Email" required>
                &nbsp;&nbsp;

                <div class="form-check form-check-inline icheck-primary d-inline">
                    <input class="form-check-input" type="radio" name="genderRadioOptions1" id="genderRadio1" value="1">
                    <label class="form-check-label" for="genderRadio1" rel="tooltip" data-placement="top" title="Female"><i class="fas fa-female"></i></label>
                </div>
                <div class="form-check form-check-inline icheck-primary d-inline">
                  <input class="form-check-input" type="radio" name="genderRadioOptions1" id="genderRadio2" value="0">
                  <label class="form-check-label" for="genderRadio2" rel="tooltip" data-placement="top" title="Male"><i class="fas fa-male"></i></label>
              </div>
            </div>
            <small id="categoryHelp" class="form-text text-muted">Your Email and Gender</small>

            <div class="row">
              <div class="col-sm-12">
                <div class="box box-primary">
                  <div class="form-check form-check-inline icheck-primary d-inline">
                    <input class="form-check-input" type="radio" name="adminRadioOptions1" id="adminRadio1" value="1">
                    <label class="form-check-label" for="adminRadio1" rel="tooltip" data-placement="top" title="Administrator">Administrator</label>
                  </div>
                  <div class="form-check form-check-inline icheck-primary d-inline">
                    <input class="form-check-input" type="radio" name="adminRadioOptions1" id="adminRadio2" value="0">
                    <label class="form-check-label" for="adminRadio2" rel="tooltip" data-placement="top" title="User">User</label>
                  </div>
                </div>
              </div>
            </div>

          </div>
      
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
            <button type="submit" class="btn btn-warning btn-sm" rel="tooltip" data-placement="top" title="Save profil">
              <i class="fas fa-save"></i> Save profil
            </button>
          </div>
      </form>
      </div>
    </div>
  </div>