@extends('layouts.author')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="bg-picture card-body">
                    <div class="d-flex align-items-top">

                        <div style="position: relative; display: inline-block;">
                            <input id="authorProfileImageInput" type="file" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                            <img class="rounded-circle avatar-xl img-thumbnail float-start me-3 flex-shrink-0" id="authorProfileImage" src="{{asset('dashboard/assets/images/users/profile.jpg')}}" alt="profile-image">
                        </div>

                        <div class="flex-grow-1 overflow-hidden">
                            <div class="col-3 m-0 my-1">
                                <input class="form-control" type="text" value="" placeholder="Profile Title">
                            </div>

                            <div class="col-8 my-1">
                                <input class="form-control" type="text" value="" placeholder="Mini Header">
                            </div>

                            <div class="col-8 my-1">
                                <textarea class="form-control" id="" name="" rows="2" placeholder="Mini Bio"></textarea>
                            </div>

                            <hr class="my-2">

                            <div class="col-10 my-1">
                                <input class="form-control" type="text" value="" placeholder="Main Header">
                            </div>

                            <div class="col-10 my-1">
                                <textarea class="form-control" id="" name="" rows="4" placeholder="Mini Bio"></textarea>
                            </div>

                            <hr class="my-2">
                            
                            <div class="col-2 m-0 my-1">
                                <input class="form-control" type="text" value="" style="font-style: italic;" placeholder="Signature">
                            </div>
                            
                            <hr class="my-2">

                            <div class="col-2">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('authorProfileImageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('authorProfileImage');
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
