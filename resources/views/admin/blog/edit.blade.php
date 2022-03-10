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
            <h1>Blog Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-info btn-sm" style="margin-right: 10px;width: 80px;" id="editbutton" onclick="edit();">Edit</button>
              <button class="btn btn-primary btn-sm" style="margin-right: 10px;width: 80px;" id="viewbutton" onclick="view();">View</button>
              <button class="btn btn-danger btn-sm" id="deleteblog" style="margin-right: 10px;width: 80px;" onclick="delete_data();">Delete</button>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if ($errors->any())
      <div class="alert alert-success">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

    <div class="alert alert-success" style="display:none" id="delete_alert">
          <ul>
              <li>Blog Deleted Successfully !</li>
          </ul>
      </div>

    <!-- Main content -->
    <section class="content">
      <form method='post' action="{{route('admin.blog.update',$blog->id)}}" id="blog_update">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
              <input type="hidden" name="_token" id="token_data" value="{{ csrf_token() }}" />
              <input type="hidden" id="delete_id" value="{{ $blog->id }}" />
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Title</label>
                  <input type="text" name="title" id="inputName" class="form-control" value="{{ $blog->title }}">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Short Description</label>
                  <input type="text" name="short_description" id="short_description" class="form-control" value="{{ $blog->short_description }}">
                </div>
                <div class="form-group">
                  <label for="inputDescription">Tags</label>
                  <input type="text" name="tags" id="tags" class="form-control" value="{{$blog->tags}}" style="width:100%">
                  
                  <!-- <select class="form-control" required="required" multiple="true" name="tags[]" id="tags" style="width: 100%">
                  @foreach($tag as $ctype)
                      <option value="{{ $ctype->id}}" @if(in_array($ctype->id, $cate)) selected @endif>{{ $ctype->tag_name}}</option>
                  @endforeach
                  </select> -->
                </div>
                <div class="form-group">
                  <label for="long_desc">Long Description</label>
                  <textarea id="long_desc" class="form-control" name='long_desc' style="display: none">{{ $blog->long_description }}</textarea>
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
          <input type="hidden" value="Save Changes" id="submitbutton" class="btn btn-success float-right" readonly>
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

<script type="text/javascript">
    
    function edit() {
      $('#inputName').removeAttr('readonly', true);
      $('#short_description').removeAttr('readonly', true);      
      $('#submitbutton').attr('type', 'submit');
      $("#viewbutton").show();
      $("#editbutton").hide();
      CKEDITOR.instances['long_desc'].setReadOnly(false);
    }

    function view(){
      $('#inputName').attr('readonly', true);
      $('#short_description').attr('readonly', true);      
      $('#submitbutton').attr('type', 'hidden');
      $("#viewbutton").hide();
      $("#editbutton").show();
      CKEDITOR.instances['long_desc'].setReadOnly(true);
    }

    view();

    function delete_data(){      
      if(confirm("Are you sure you want to delete this?")){
        var d_id = $('#delete_id').val();
        $.ajax({
          url: "/blog/delete",
          type:"GET",
          data:{
            id:d_id
          },
          success:function(response){
            console.log(response);
            if(response == 1){
              alert('Blog Deleted Successfully !');
              window.location.href = "/";
              
            }else{
              
            }                    
          },
        });
      }
      else{
          return false;
      }
      //$('#delete_alert').css('display','block');
    }

</script>
<script>
      $(function() {
        $('#tags').tagsinput({
         
        });
      });
    </script>
