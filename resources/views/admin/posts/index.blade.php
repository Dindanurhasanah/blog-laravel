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
            <h1>Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <a href="{{ route('posts.create') }}">
          <button class="btn btn-primary btn-sm"><i class="fas fa-plus">Tambah Post</i></button>
         </a>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <tr class="table-primary">
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Kunjungan</th>
                <th>Gambar</th>
                <th>Terakhir Kali Dimodifikasi</th>
                <th>Aksi</th>
                <th></th>
                {{-- <tr class="table-primary">
                    <th scope="col"> --}}
                        {{-- <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="inlineCheckbox1" value="option1">
                        </div> --}}
                        {{-- <i class="fas fa-file-signature" rel="tooltip" data-placement="top" title="Title"></i> --}}
                        {{-- <div class="col-sm-6">
                          <h1>Judul</h1>
                        </div>
                    </th>
                    <th scope="col" style="text-align:center">
                        {{-- <i class="far fa-id-card" rel="tooltip" data-placement="top" title="Author"></i> --}}
                    {{-- </th>
                    <th scope="col" style="text-align:center">
                    <i class="fas fa-server nav-icon" rel="tooltip" data-placement="top" title="Category"></i>
                    </th>
                    <th scope="col" style="text-align:center">
                    <i class="fas fa-comments" rel="tooltip" data-placement="top" title="Comments"></i>
                    </th>
                    <th scope="col" style="text-align:center">
                    <i class="fab fa-readme" rel="tooltip" data-placement="top" title="Post visits"></i>
                    </th>
                    <th scope="col" style="text-align:center">
                    <i class="fas fa-image" rel="tooltip" data-placement="top" title="Featured image"></i>
                    </th>
                    <th scope="col" style="text-align:center">
                    <i class="far fa-calendar" rel="tooltip" data-placement="top" title="Last Time Modified"></i>
                    </th>
                    <th scope="col"></th> --}}
                </tr>
            </thead>
            <tbody>
              @foreach($posts as $post)
              <tr>
                <td rel="tooltip" data-placement="top" title="Full title: {{$post->title}}">
                  <div class="form-check form-check-inline">
                    {{-- <input class="form-check-input" type="checkbox" name="inlineCheckbox1" id="inlineCheckbox1" value="option1"> --}}
                    <label class="form-check-label" for="inlineCheckbox1">
                      <?php
                        $short_title = substr($post->title, 0, 40);
                      ?>
                    </label>
                    <span ondb1click="window.location='{{ route('posts.edit', $post->slug) }}'">{{$short_title}}...</span>
                  </div>
                  
                </td>
                <td>
                  <div class="user-block">
                    @foreach($users as $user)
                    @if($user->id === $post->user_id)
                    <div class="user-block">
                      <img class="zoom img-box" src="/images/users/{{ $user->avatar }}" alt="User Avatar">
                    </div>
                    {{-- <div>
                      <img class="zoom img-box" src="dist/img/profil2.png" alt="">
                    </div> --}}
                    <span class="username">
                      {{ $user->name }}
                      @endif
                      @endforeach
                    </span>
                    <span class="description"> Shared pulicly - 7:45 PM today </span>
                  </div>
                </td>
                <td>
                  @foreach($categories as $category)
                  @if($category->id === $post->category_id)
                    {{ $category->name }}
                  @endif
                @endforeach
                </td>
                <td>
                  <i class="fas fa-user-friends"></i>
                  <span class="badge-pill badge-success" rel="tooltip" data-placement="top" title="kunjungan">
                    {{ $post->view_count }}
                  </span>
                </td>
                <td>
                  <img class="zoom img-box" src="/images/posts/{{ $post->image }}" width="100" alt="">
                </td>
                <td>
                  <span class="badge-pill badge-success" rel="tooltip" data-placement="top" title="Terakhir Kali Dimodifikasi">
                    {{$post->updated_at}}
                  </span>    
                </td>
                <td>
                  <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-info btn-sm" rel="tooltip" data-placement="top" title="Edit Post"><i class="fa fa-fw fa-edit"></i></a>
                  <button type="button" class="btn btn-danger btn-sm" rel="tooltip" data-placement="top" title="Delete Post" data-toggle="modal" data-target="#deleteModalCenterPost" data-id="{{$post->id}}">
                    <i class="fas fa-trash"></i>
                  </button>
                  <a href="{{ route('posts.single', $post->slug) }}" target="_blank" class="btn btn-info btn-sm" rel="tooltip" data-placement="top" title="Detail Post"><i class="fas fa-eye"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @include('layouts.admin.modals.delete_post')
        </div>
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
