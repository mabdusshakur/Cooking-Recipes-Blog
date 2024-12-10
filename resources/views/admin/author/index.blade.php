@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card px-5 py-5">
                    <div class="row justify-content-between">
                        <div class="align-items-center col">
                            <h4>Authors</h4>
                        </div>
                    </div>
                    <hr class="bg-secondary" />
                    <div class="table-responsive">
                        <table class="table" id="tableData">
                            <thead>
                                <tr class="bg-light">
                                    <th>Name</th>
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
            let res = await axios.get("/api/v1/admin/author");
            res = res.data[0].data;

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            tableData.DataTable().destroy();
            tableList.empty();

            res.forEach(function(item, index) {
                let row = ` <tr>
                        <td>${item.user.name}</td>
                        <td>
                            <span class="badge ${item.is_active == 1 ? 'bg-success' : 'bg-info'}">${item.is_active == 1 ? 'Approved' : 'Pending' }</span>
                        </td>
                        <td>${new Date(item.created_at).toLocaleDateString()}</td>
                        <td>
                            <button class="btn btn-sm btn-info waves-effect waves-light approveBtn" data-id="${item.id}" type="button" ${item.is_active == 1 ? 'disabled' : '' }>
                                <i class="mdi mdi-check"></i>
                            </button>
                        </td>
                    </tr>`
                tableList.append(row)
            });

            $('.approveBtn').on('click', async function() {
                const author_id = $(this).data('id');
                const res = await axios.patch(`/api/v1/admin/author/approve`, {
                    author_id
                });
                if (res.data && res.data.success == true) {
                    alert(res.data.message);
                    getList();
                }
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
