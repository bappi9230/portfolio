@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Edit Portfolio </h4>
            <form method="post" action="{{ route('update.portfolio') }}" enctype="multipart/form-data">
               @csrf
                <input type="hidden" name="id" value="{{ $portfolio->id }}">

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$portfolio->title}}" name="title" id="title">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="short_title" class="col-sm-2 col-form-label">Portfolio Short Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$portfolio->short_title}}" name="short_title" id="short_title">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                    <div class="col-sm-10">
                        <textarea id="elm1" name="portfolio_description" name="area">
                            {{ $portfolio->portfolio_description }}
                        </textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" value="{{$portfolio->portfolio_image}}" name="portfolio_image" id="image">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                       <img class="rounded-circle avatar-xl" id="showImage" src="{{ (!empty($portfolio->portfolio_image))? url($portfolio->portfolio_image): url('upload/no_image.jpg') }}" alt="Card image cap">
                    </div>
                </div>
                <button type="submit" class="btn btn-info waves-effect waves-light">Update Portfolio</button>
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


