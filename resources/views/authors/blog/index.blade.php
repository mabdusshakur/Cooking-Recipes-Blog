@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card px-5 py-5">
                    <div class="row justify-content-between">
                        <div class="align-items-center col">
                            <h4>Blog</h4>
                        </div>
                    </div>
                    <hr class="bg-secondary" />
                    <div class="table-responsive">
                        <table class="table" id="tableData">
                            <thead>
                                <tr class="bg-light">
                                    <th>Thumb</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Submit Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableList">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        getList();


        async function getList() {
            let res = await axios.get("/api/v1/author/blog-post");
            res = res.data[0];

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            tableData.DataTable().destroy();
            tableList.empty();

            res.forEach(function(item, index) {
                let row = ` <tr>
                        <td><img src="${item.main_image}" alt="Thumbnail" width="50"></td>
                        <td>${item.title}</td>
                        <td>
                            <span class="badge ${item.is_active == 1 ? 'bg-success' : 'bg-info'}">${item.is_active == 1 ? 'Approved' : 'Pending' }</span>
                        </td>
                        <td>${new Date(item.created_at).toLocaleDateString()}</td>
                        <td>
                            <button class="btn btn-sm btn-info waves-effect waves-light" type="button" data-id="${item.id}">
                                <i class="mdi mdi-x"></i>
                            </button>
                        </td>
                    </tr>`
                tableList.append(row)
            })

            new DataTable('#tableData', {
                order: [
                    [0, 'desc']
                ],
                lengthMenu: [5, 10, 15, 20, 30]
            });
        }
    </script>
@endsection
