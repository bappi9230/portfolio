@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h3 class=" " style="margin-left:35%">All Blog Dashboard</h3>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>SI</th>
                                    <th>Blog Category</th>
                                    <th>Blog Title</th>
                                    <th>Blog Tag</th>
                                    <th>Blog Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php($i =1)
                                @foreach($blog as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->blog_category_id }}</td>
                                    <td>{{ $item->blog_title }}</td>
                                    <td>{{ $item->blog_tags }}</td>
                                    <td><img src="{{ asset($item->blog_image) }}" style="width:60px;height:50px"></td>
                                    <td>
                                        <a href="{{ route('edit.blog',$item->id) }}" class="btn btn-info sm" title="Edit Image" ><i class="fas fa-edit" ></i></a>
                                        <a href="{{ route('delete.blog',$item->id)}}" class="btn btn-danger sm" title="Delete Image" id="delete" ><i class="fas fa-trash-alt" ></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

@endsection('admin')
