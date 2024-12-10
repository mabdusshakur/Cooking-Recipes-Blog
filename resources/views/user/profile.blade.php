@extends('layouts.user')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3 mt-0">Become An Author ?</h4>
                        <div class="widget-box-2">
                            <button class="btn btn-success center" id="authorApplyBtn">Apply</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const user = JSON.parse(localStorage.getItem('user'));
        const data = {
            user_id: user.id
        };

        document.getElementById('authorApplyBtn').addEventListener('click', function() {
            axios.post('/api/v1/user/apply', data).then(function(response) {
                console.log(response.data);
                if (response.data && response.data.success == true) {
                    alert(response.data.message);
                }
            }).catch(function(error) {
                console.log(error.response.data);
            });
        });
    </script>
@endsection
