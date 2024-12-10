@extends('layouts.admin')
@section('content')
    <div class="row">

        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="header-title mt-0">All Blog Categories</h4>
                <p class="text-muted font-14 mb-3">
                    All the available blog categories are listed here. If you need a new category you can create one too.
                </p>

               
                <table class="table-bordered table-bordered dt-responsive nowrap table" id="responsive-datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Submit Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>
                                <span class="badge bg-success">Approved</span>
                                <span class="badge bg-info">Pending</span>
                            </td>
                            <td>2024/11/12</td>
                            <td>
                                   
                                <a class="btn btn-sm btn-info waves-effect waves-light" type="button">
                                    <i class="mdi mdi-check"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@include('authors.blog.category.create')
