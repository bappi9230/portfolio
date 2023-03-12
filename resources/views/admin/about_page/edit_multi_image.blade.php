@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center pb-4">Edit Multi Image</h4>
            <form method="post" action="{{ route('update.multi.image') }}" enctype="multipart/form-data">
               @csrf
                <input type="hidden" value="{{ $editMultiImage->id }}" name="id">
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"> Multi Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="multi_image" id="image">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                       <img class="rounded-circle avatar-xl" id="showImage" src="{{ asset($editMultiImage->multi_image) }}" alt="Card image cap">
                </div>
                </div>
                <button type="submit" class="btn btn-info waves-effect waves-light">Update Multi Image </button>
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


