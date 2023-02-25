<!DOCTYPE html>
<html>
<head>
  @include('layouts.admin.head')
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.admin.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengguna</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <table class="table tabel-hover">
            <thead>
                <tr class="table-primary">
                    <th>Nama</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Foto Profil</th>
                    <th>Role</th>
                    <th scope="col" class="text-center">Aksi</th>
                    {{-- <th scope="col">
                        <div form-check form-check-inline>
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        </div>
                        <i class="fas fa-user" rel="tooltip" data-placement="top" title="Username"></i>
                    </th>
                    <th scope="col" style="text-align: center">
                        <i class="far fa-id-card" rel="tooltip" data-placement="top" title="Name"></i>
                    </th>
                    <th scope="col" style="text-align: center">
                        <i class="fas fa-envelope" rel="tooltip" data-placement="top" title="email"></i>
                    </th> --}}
                    {{-- <th scope="col" style="text-align: center">
                        <i class="fas fa-image" rel="tooltip" data-placement="top" title="Avatar"></i>
                    </th>
                    <th scope="col" style="text-align: center">
                        <i class="fas fa-user-shield" rel="tooltip" data-placement="top" title="Role"></i> /
                        <i class="fas fa-user-check" rel="tooltip" data-placement="top" title="Online"></i>
                    </th>
                    <th scope="col" style="text-align: center">
                        <i class="fas fa-file-alt" rel="tooltip" data-placement="top" title="Posts"></i>
                    </th>
                    <th scope="col" style="text-align: center">
                        <i class="fas fa-comments" rel="tooltip" data-placement="top" title="Comments"></i>
                    </th>
                    <th scope="col"></th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <div form-check form-check-inline>
                                {{-- <input class="form-check-input" type="checkbox" name="inlineCheckbox1" id="inlineCheckbox1" value="option1"> --}}
                                <label class="form-check-label" for="inlineCheckbox1">
                                    {{ $user->nickname }}
                                </label>
                            </div>
                        </td>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        <td>
                            <div class="user-block">
                                <img class="zoom img-box" src="/images/users/{{ $user->avatar }}" alt="User Avatar">
                            </div>
                        </td>
                        <td>
                            @php($role=$user->is_admin)
                            @if($role==1)
                                Administrator / YES
                            @else
                                User / YES
                            @endif
                        </td>
                        <td class="text-right">
                            <a href="" class="btn btn-info btn-sm" rel="tooltip" data-placement="top" title="Edit User" data-toggle="modal" data-target="#edit_user" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-gender="{{ $user->gender }}" data-avatar="{{ $user->avatar }}" data-nickname="{{ $user->nickname }}" data-is_admin="{{$user->is_admin}}" data-id="{{ $user->id }}">
                                <i class="fa fa-fw fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" rel="tooltip" data-placement="top" title="Delete User" data-toggle="modal" data-target="#deleteModalCenter" data-id="{{$user->id}}">
                                <i class="fas fa-trash"></i>
                            </button>
                            <a href="" target="_blank" class="btn btn-info btn-sm" rel="tooltip" data-placement="top" title="Viewuser profil">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        @include('layouts.admin.modals.delete_user')
        @include('layouts.admin.modals.edit_user')
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.admin.footer')
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('layouts.admin.scripts')
</body>
</html>
