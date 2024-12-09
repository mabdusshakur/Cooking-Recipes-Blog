@extends('layouts.author')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="header-title mt-0">All Recipes</h4>
                    <p class="text-muted font-14 mb-3">
                        All your recipes are listed here. You can edit them, as well as create new recipe. <strong>If you need new category for your recipe, you can create them </strong><a href="{{ route('front.author.recipe.category.index') }}">here</a>.
                    </p>

                    <div class="mb-3 text-end">
                        <a class="btn btn-sm btn-success waves-effect waves-light" type="button" href="{{ route('front.author.recipe.create') }}">
                            <i class="mdi mdi-plus"></i>
                        </a>
                    </div>
                    <table class="table-bordered table-bordered dt-responsive nowrap table" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th>Thumb</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Submit Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <img class="img-fluid avatar-sm rounded" src="{{ asset('dashboard/assets/images/users/user-5.jpg') }}" alt="image">
                                </td>
                                <td>Tiger Nixon</td>
                                <td>
                                    <span class="badge bg-success">Approved</span>
                                    <span class="badge bg-info">Pending</span>
                                </td>
                                <td>2024/11/12</td>
                                <td>
                                    <a class="btn btn-sm btn-danger waves-effect waves-light" type="button">
                                        <i class="mdi mdi-close"></i>
                                    </a>
                                    <a class="btn btn-sm btn-info waves-effect waves-light" type="button">
                                        <i class="mdi mdi-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
