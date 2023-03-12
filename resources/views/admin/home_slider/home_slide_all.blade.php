@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Edit Home Slider</h4>
            <form method="post" action="{{ route('update.slide') }}" enctype="multipart/form-data">
               @csrf
                <input type="hidden" name="id" value="{{ $homeSlide->id }}">

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$homeSlide->title}}" name="title" id="title">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="short_title" class="col-sm-2 col-form-label">Short Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$homeSlide->short_title}}" name="short_title" id="short_title">
                    </div>
                </div>
                <div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="Username" name="video_url" id="example-text-input" value="{{ $homeSlide->video_url }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" value="{{$homeSlide->home_slide}}" name="home_slide" id="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                       <img class="rounded-circle avatar-xl" id="showImage" src="{{ (!empty($homeSlide->home_slide))? url($homeSlide->home_slide): url('upload/no_image.jpg') }}" alt="Card image cap">
                    </div>
                </div>
                <button type="submit" class="btn btn-info waves-effect waves-light">Update Slider</button>
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


