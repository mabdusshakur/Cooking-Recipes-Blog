@extends('layouts.author')
@section('content')
    <div class="row">

        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="header-title mt-0">All Recipe Categories</h4>
                <p class="text-muted font-14 mb-3">
                    All the available recipe categories are listed here. If you need a new category you can create one too.
                </p>

                <div class="mb-3 text-end">
                    <button class="btn btn-sm btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#recipe-category-modal" type="button">
                        <i class="mdi mdi-plus"></i>
                    </button>
                </div>
                <table class="table-bordered table-bordered dt-responsive nowrap table" id="responsive-datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Submit Date</th>
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
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@include('authors.recipe.category.create')
