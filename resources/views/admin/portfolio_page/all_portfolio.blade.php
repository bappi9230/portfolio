@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h3 class=" " style="margin-left:35%">All Portfolio Dashboard</h3>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Portfolio</li>
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
                                    <th>Title</th>
                                    <th>Short Title</th>
                                    <th>Portfolio Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php($i =1)
                                @foreach($portfolio as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->short_title }}</td>
                                    <td><img src="{{ asset($item->portfolio_image) }}" style="width:60px;height:50px"></td>
                                    <td>
                                        <a href="{{ route('edit.portfolio',$item->id) }}" class="btn btn-info sm" title="Edit Image" ><i class="fas fa-edit" ></i></a>
                                        <a href="{{ route('delete.portfolio',$item->id)}}" class="btn btn-danger sm" title="Delete Image" id="delete" ><i class="fas fa-trash-alt" ></i></a>
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
