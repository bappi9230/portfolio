@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">About Page</h4>
            <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
               @csrf
                <input type="hidden" name="id" value="{{ $aboutPage->id }}">

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$aboutPage->title}}" name="title" id="title">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$aboutPage->short_title}}" name="short_title" id="short_title">
                    </div>
                </div>
                <div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                        <textarea required="" class="form-control" name="short_description" rows="5">
                            {{ $aboutPage->short_description }}
                        </textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="long_description" name="area">
                            {{ $aboutPage->long_description }}
                        </textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" value="{{$aboutPage->about_image}}" name="about_image" id="image">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                       <img class="rounded-circle avatar-xl" id="showImage" src="{{ (!empty($aboutPage->about_image))? url($aboutPage->about_image): url('upload/no_image.jpg') }}" alt="Card image cap">
                    </div>
                </div>
                <button type="submit" class="btn btn-info waves-effect waves-light">Update About</button>
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


