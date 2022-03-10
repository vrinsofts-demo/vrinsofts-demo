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
            <h1>Blog Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blog Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

    <!-- Main content -->
    <section class="content">
      <form method='post' action="{{route('admin.blog.store')}}" id="blog_update">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Title</label>
                  <input type="text" name="title" id="inputName" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Short Description</label>
                  <input type="text" name="short_description" id="short_description" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Tags</label>
                  <input type="text" name="tags" id="tags" class="form-control" value="" style="width:100%">
                </div>
                <div class="form-group">
                  <label for="long_desc">Long Description</label>
                  <textarea id="long_desc" class="form-control" name='long_desc'></textarea>
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
      </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <br>

@include('admin/layout/footer')
<script type="text/javascript">
  
    CKEDITOR.replace('long_desc',{

        width: "100%",
        height: "200px"
   
    }); 
  
      
  </script>
  <script>
      $(function() {
        $('#tags').tagsinput({
         
        });
      });
    </script>