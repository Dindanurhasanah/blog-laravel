<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function(){
        $('[rel="tooltip"]').tooltip();
    });
</script>

<script>
     @if(Session::has('message'))
    toastr.options = 
    {
        "closeButton" : true,
        "positionClass" : "toast-bottom-right",
        "progressBar" : true,
    }
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = 
    {
        "closeButton" : true,
        "progressBar" : true,
    }
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options = 
    {
        "closeButton" : true,
        "progressBar" : true,
    }
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('success'))
    toastr.options = 
    {
        "closeButton" : true,
        "progressBar" : true,
    }
    toastr.success("{{ session('success') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options = 
    {
        "closeButton" : true,
        "positionClass" : "toast-bottom-right",
        "progressBar" : true,
    }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
   
<script>
    $('#deleteModalCenter').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    })
</script>

<script>
    $('#deleteModalCenterPost').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #name').val(name);
    })
</script>

<script>
    $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>

<script>
    $('#edit_user').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var email = button.data('email')
        var gender = button.data('gender')
        var avatar = button.data('avatar')
        var nickname = button.data('nickname')
        var is_admin = button.data('is_admin')
        var is_user = button.data('is_user')


        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #gender').val(gender);
        modal.find('.modal-body #avatar').val(avatar);
        modal.find('.modal-body #nickname').val(nickname);
        modal.find('.modal-body #is_admin').val(is_admin);
        modal.find('.modal-body #is_user').val(is_user);

        var oldimage = avatar;
        var putanjauser = '../images/posts';
        preview.setAttribute('src', putanjauser + oldimage);

    });
</script>