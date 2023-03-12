@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center pb-3">Edit Blog Page</h4>
            <form method="post" action="{{ route('update.blog') }}" enctype="multipart/form-data">
               @csrf
                <input type="hidden" value="{{ $blog->id }}" name="id">
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Blog Category Name<b class="text-danger"> *</b></label>
                    <div class="col-sm-10">
                       <select name="blog_category_id" class="form-select" aria-label="Default select example">
                            <option selected="">Open this select menu</option>
                            @foreach($blogCategory as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $blog->blog_category_id ? 'selected' : '' }} >{{ $cat->blog_category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="short_title" class="col-sm-2 col-form-label">Blog Title<b class="text-danger"> *</b></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{ $blog->blog_title }}" name="blog_title" id="short_title">
                        @error('blog_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="short_title" class="col-sm-2 col-form-label">Blog Tags<b class="text-danger"> *</b></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{ $blog->blog_tags }}" name="blog_tags" id="short_title" data-role="tagsinput">
                        @error('blog_tags')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="blog_description" name="area">
                        {{$blog->blog_description }}
                        </textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image<b class="text-danger"> *</b></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="blog_image" id="image">
                        @error('blog_image')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                       <img class="rounded-circle avatar-xl" id="showImage" src="{{asset($blog->blog_image)}}" alt="Card image cap">
                    </div>
                </div>

                <button type="submit" class="btn btn-info waves-effect waves-light">Update BLog Data</button>
            </form>
        </div>
    </div>
</div> <!-- end col -->
</div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
   $('#image').change(function(e){
       var reader = new FileReader()
       reader.onload = function(e){
          $('#showImage').attr('src',e.target.result);
       }
    reader.readAsDataURL(e.target.files['0']);
   })
})
</script>

@endsection


