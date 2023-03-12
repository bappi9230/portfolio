@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Footer Page</h4>
            <form method="post" action="{{ route('update.footer') }}" >
               @csrf
                <input type="hidden" name="id" value="{{ $allFooter->id }}">

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$allFooter->number}}" name="number" id="title">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-10">
                        <textarea required="" class="form-control" name="short_description" rows="5">
                            {{ $allFooter->short_description }}
                        </textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$allFooter->address}}" name="address" id="title">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" value="{{$allFooter->email}}" name="email" id="title">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$allFooter->facebook}}" name="facebook" id="title">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$allFooter->twitter}}" name="twitter" id="title">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">CopyRight</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="{{$allFooter->copyright}}" name="copyright" id="title">
                    </div>
                </div>


                <button type="submit" class="btn btn-info waves-effect waves-light">Update Footer Page</button>
            </form>
        </div>
    </div>
</div> <!-- end col -->
</div>
    </div>
</div>


@endsection


