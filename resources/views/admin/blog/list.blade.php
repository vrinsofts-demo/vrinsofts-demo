@include('admin/layout/header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    @if (session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
    @endif


    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-info btn-sm" style="margin-right: 10px;width: 100px;" href="{{ route('admin.create') }}">
              <i class="fas fa-pluse"></i>
                Add
              </a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            @foreach($blog as $blog)
            <a href="{{ route('admin.edit',$blog->id) }}">
              <div class="card">
                <div class="card-body">
                  <h3 class="profile-username"><strong>{{ $blog->title }}</strong></h3>

                  <p class="timeline-body" style="color:#443d3d">
                    {{ $blog->short_description }}
                  </p>
                </div>
              </div>
            </a>
            @endforeach
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('admin/layout/footer')
