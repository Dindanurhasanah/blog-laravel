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
            <h1>Tambah / Edit Post</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Legacy User Menu</li>
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
          <h3 class="card-title">
            @if(isset($post))
              <i class="fa fa-fw fa-edit"></i>Edit Post
            @else
              <i class="fas fa-plus"></i> Tambah Post
            @endif
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <script>
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
             toastr.error("{{ $error }}");
            @endforeach
            @endif
          </script>
          <form name="PostCreateEdit" action="{{ isset($post) ? route('posts.update', $post->slug) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @if(isset($post))
              {{method_field('patch')}}
            @endif
            @csrf
            <div class="row">

              <div class="col-sm-9">
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">
                      <i class="fas fa-file-signature"></i>
                    </span>
                  </div>
                  <input type="text" name="title" id="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Judul" value="{{ isset($post) ? $post->title : '' }}" autofocus="" required>
                </div>
              

              <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-file-contract"></i></span>
                </div>
                <input type="text" name="description" id="description" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Deskripsi" value="{{ isset($post) ? $post->description : '' }}">
              </div>

              <div class="form-group">
                <label for="Postcontent">Post Konten</label>
                <textarea name="content" id="content" cols="555" rows="15" class="form-control">
                  {{ isset($post) ? $post->content : ''}}
                </textarea>
              </div>
              <script>
                $(document).ready(function() {
                $('#content').summernote();
                });
              </script>

              <div class="container">
                <input class="input-tags" type="hidden" data-role="tagsinput" name="tags" id="tags">
              </div>

              <div class="input-group input-group-sm mb-3">
                <input type="hidden" name="slug" id="slug" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{ isset($post) ? $post->slug : '' }}" placeholder="slug">
              </div>
              @if(isset($post))
                <div class="input-group input-group-sm mb-3">
                  <div class="input-group-prepend"></div>
                  <input type="hidden" name="user_id" id="user_id" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{ isset($post) ? $post->user_id : '' }}" placeholder="id user">
                </div>
                @foreach($users as $user)
                  @if($user->id === $post->user_id)
                    <span class="badge-pill badge-primary">
                      Dibuat oleh : {{ $user->name }}
                    </span>
                  @endif
                @endforeach
              @endif

              </div>

              <div class="col-sm-3">

                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="form-check form-check-inline icheck-primary d-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked="">
                          <label class="form-check-label" for="inlineRadio1">Publish</label>
                        </div>
                        <div class="form-check form-check-inline icheck-primary d-inline">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                          <label class="form-check-label" for="inlineRadio2">Save as draft</label>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-check form-check-inline icheck-primary d-inline">
                          <button type="submit" class="btn btn-app"><i class="fas fa-save">Save</i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-body">
                    @if(isset($post))
                      Gambar unggulan <br>
                      <input type="hidden" name="old_image" id="old_image" class="form-control" placeholder="" value="{{ $post->image }}">
                      <img src="/images/posts/{{ $post->image }}" id="preview" alt="" class="browse card-img-top">
                      <input type="file" name="image" id="image" class="file" accept="image/*">
                      @else
                      Set featured image
                      <img src="/images/posts/no-image2.png" id="preview" alt="" class="browse card-img-top">
                      <input type="file" name="image" id="image" class="file" accept="image/*" required="">
                    @endif
                    <small id="postHelp" class="form-text text-muted">Klik gambar untuk memperbaharui</small>
                  </div>
                </div>

                <div class="card">
                  <div class="card-body">
                    Select a category for post!
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                        @if(isset($post))
                          @if($category->id === $post->category_id)
                            <option value="{{ $category->id }}" selected="">
                              {{ $category->name }}
                            </option>
                          @else
                            <option value="{{ $category->id }}">
                              {{ $category->name }}
                            </option>
                          @endif
                          @else
                          <option value="{{ $category->id }}">
                            {{ $category->name }}
                          </option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>

              </div>
            </div>
          </form>
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
