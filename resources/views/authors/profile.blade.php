@extends('layouts.author')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="bg-picture card-body">
                    <div class="d-flex align-items-top">

                        <div style="position: relative; display: inline-block;">
                            <input id="authorProfileImageInput" type="file" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer;">
                            <img class="rounded-circle avatar-xl img-thumbnail float-start me-3 flex-shrink-0" id="authorProfileImage" src="{{ asset('dashboard/assets/images/users/profile.jpg') }}" alt="profile-image">
                        </div>

                        <div class="flex-grow-1 overflow-hidden">
                            <div class="col-3 m-0 my-1">
                                <input class="form-control" id="profile_title" type="text" placeholder="Profile Title">
                            </div>

                            <div class="col-8 my-1">
                                <input class="form-control" id="mini_header" type="text" placeholder="Mini Header">
                            </div>

                            <div class="col-8 my-1">
                                <textarea class="form-control" id="mini_bio" name="" rows="2" placeholder="Mini Bio"></textarea>
                            </div>

                            <hr class="my-2">

                            <div class="col-10 my-1">
                                <input class="form-control" id="main_header" type="text" placeholder="Main Header">
                            </div>

                            <div class="col-10 my-1">
                                <textarea class="form-control" id="main_bio" name="" rows="4" placeholder="Main Bio"></textarea>
                            </div>

                            <hr class="my-2">

                            <div class="col-2 m-0 my-1">
                                <input class="form-control" id="signature" type="text" style="font-style: italic;" placeholder="Signature">
                            </div>

                            <hr class="my-2">

                            <div class="col-2">
                                <button class="btn btn-primary" id="saveBtn">Save</button>
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

        const main_image = document.getElementById('authorProfileImageInput').files[0];
        const profile_title = document.getElementById('profile_title').value;
        const mini_header = document.getElementById('mini_header').value;
        const mini_bio = document.getElementById('mini_bio').value;
        const main_header = document.getElementById('main_header').value;
        const main_bio = document.getElementById('main_bio').value;
        const signature = document.getElementById('signature').value;
        const saveBtn = document.getElementById('saveBtn');

        saveBtn.addEventListener('click', async function() {
            const formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append('main_image', main_image);
            formData.append('profile_title', profile_title);
            formData.append('mini_header', mini_header);
            formData.append('mini_bio', mini_bio);
            formData.append('main_header', main_header);
            formData.append('main_bio', main_bio);
            formData.append('signature', signature);

            for (const pair of formData.entries()) {
                console.log(pair[0], pair[1]);
            }

            await axios.post('/api/v1/author/profile', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(function(response) {
                if (res.status == 200) {
                    getProfile();
                }
            }).catch(function(error) {
                console.log(error.response.data);
            });


        });

        const getProfile = async () => {
            await axios.get('/api/v1/author/profile').then(function(response) {
                if (response.data && response.data.success == true) {
                    document.getElementById('authorProfileImage').src = response.data[0].main_image;
                    document.getElementById('profile_title').value = response.data[0].profile_title;
                    document.getElementById('mini_header').value = response.data[0].mini_header;
                    document.getElementById('mini_bio').value = response.data[0].mini_bio;
                    document.getElementById('main_header').value = response.data[0].main_header;
                    document.getElementById('main_bio').value = response.data[0].main_bio;
                    document.getElementById('signature').value = response.data[0].signature;

                    localStorage.setItem('user', JSON.stringify(response.data[0]));
                }
            }).catch(function(error) {
                console.log(error.response.data);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            getProfile();
        });
    </script>
@endsection
