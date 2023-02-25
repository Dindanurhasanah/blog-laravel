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
            <h1>Kategori</h1>
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
        <div class="row">
        {{-- CRUD (Add new category and Edit category) START--}}
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-server nav-icon"></i>
                            <a href="{{ route('categories.index') }}">
                              <i class="fas fa-plus" rel="tooltip" data-placement="top" title="Add new"></i>
                              Tambah / Edit Kategori
                            </a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <script>
                            @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                toastr.error("{{ $error }}");
                            @endforeach
                            @endif
                        </script>
                        
                        <form action="{{ isset($category) ? route('categories.update', $category->slug) : route('categories.store') }}" method="POST">
                            @if(isset($category))
                                {{method_field('patch')}}
                            @endif
                            @csrf
                            <label for="Name">Nama:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fas fa-file-signature"></i> </span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control" aria-describedby="categoryHelp" placeholder="Add Category Name" value="{{ isset($category) ? $category->name : '' }}" required="autofocus">
                            </div>
                            <small id="categoryHelp" class="form-text text-muted">The name is how it appears on your site.</small>
                            <div class="form-check form-check-inline icheck-primary d-inline">
                                <input class="form-check-input" type="radio" name="statusRadioOptions1" id="statusRadio1" value="1" checked="">
                                <label class="form-check-label" for="statusRadio1">Publish</label>
                            </div>
                            <div class="form-check form-check-inline icheck-primary d-inline">
                                <input class="form-check-input" type="radio" name="statusRadioOptions1" id="statusRadio2" value="0">
                                <label class="form-check-label" for="statusRadio2">Save as draft</label>
                            </div>
                            <div class="form-check form-check-inline" style="display: flex; justify-content: flex-end;">
                                <input class="form-check-input" type="checkbox" name="priorityChekbox" id="priorityChekbox" value="1">
                                <label class="form-check-label" for="priorityChekbox">
                                    Add Category to Main Menu
                                </label>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" rel="tooltip" data-placement="top" title="Save Category"><i class="fas fa-save"></i>Save</button>
                                <a href="" class="btn btn-primary" rel="tooltip" data-placement="top" title="Cancel all actions"><i class="fas fa-window-close"></i>Cancel</a>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        {{-- CRUD (Add new category and Edit category) END--}}

        {{-- Bootstrap view table, with buttons for edit and delete) START--}}
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-server nav-icon"></i>
                            Semua Kategori 
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="table-primary">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col" class="text-center">Jumlah Post</th>
                                        <th scope="col" class="text-center">Diterbitkan / Menu utama</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($count=0)
                                    @foreach ($categories as $category)
                                    @php($count++)
                                    <tr>
                                        <th scope="row">{{$count}}</th>
                                        <td>{{ $category->name }}</td>
                                        <td class="text-center">{{ $category->posts->count() }}</td>
                                        <td class="text-center">
                                            @if($category->status==1)
                                                <span class="badge badge-pill badge-success">YES</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">NO</span>
                                            @endif
                                            @if($category->priority==1)
                                                <span class="badge badge-pill badge-success">YES</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">NO</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-info btn-sm" rel="tooltip" data-placement="top" title="Edit Category"><i class="fa fa-fw fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm" rel="tooltip" data-placement="top" title="Delete Category" data-toggle="modal" data-target="#deleteModalCenter" data-id="{{$category->id}}"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @include('layouts.admin.modals.delete_category')
                        </div>
                    </div>
                </div>
            </div>
{{-- Bootstrap view table, with buttons for edit and delete) END--}}
        </div>
     

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
