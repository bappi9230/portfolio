
@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Admin change password</h4>

            @if(count($errors))
               @foreach($errors->all() as $error)
               <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
               @endforeach
            @endif



            <form method="post" action=" {{ route('update.password') }}">
               @csrf
                <div class="row mb-3">
                    <label for="oldPassword" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="oldPassword" id="oldPassword" placeholder="*********">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="newPassword" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="newPassword" id="newPassword" placeholder="New Password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-info waves-effect waves-light">Update Password</button>
            </form>
        </div>
    </div>
</div> <!-- end col -->
</div>
    </div>
</div>


@endsection


