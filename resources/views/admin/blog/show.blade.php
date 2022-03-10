@include('admin/layout/header')
<!-- CSS -->
  <style type="text/css">
  .cke_textarea_inline{
    border: 1px solid black;
  }
  </style>

  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Title</label>
                  <input type="text" name="title" id="inputName" class="form-control" value="{{ $blog->title }}">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Short Description</label>
                  <p>{! $blog->short_description !}</p>
                </div>
                <div class="form-group">
                  <label for="long_desc">Long Description</label>
                  <p>{! $blog->long_description !}</p>
                </div>
              </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ route('admin.blog') }}" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <br>

@include('admin/layout/footer')
