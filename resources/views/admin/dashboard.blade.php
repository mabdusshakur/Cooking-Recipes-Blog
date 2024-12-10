@extends('layouts.admin')
@section('content')
    

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Blogs</h4>
                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <h2 class="fw-normal mb-1"> 8451 </h2>
                    </div>
                    <div class="progress progress-bar-alt-success progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="77"
                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Recipes</h4>
                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <h2 class="fw-normal mb-1"> 8451 </h2>
                    </div>
                    <div class="progress progress-bar-alt-warning progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="77"
                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Reach</h4>
                <div class="widget-box-2">
                    <div class="widget-detail-2 text-end">
                        <h2 class="fw-normal mb-1"> 8451 </h2>
                    </div>
                    <div class="progress progress-bar-alt-info progress-sm">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="77"
                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    axios.get('/api/v1/admin/profile').then(function(response) {
        if(response.data && response.data.success == true) { 
            console.log(response.data);
            localStorage.setItem('user', JSON.stringify(response.data[0]));
        }
    }).catch(function(error) {
        console.log(error.response.data);
    });
</script>

@endsection