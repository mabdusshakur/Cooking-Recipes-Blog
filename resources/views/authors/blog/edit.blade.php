@extends('layouts.author')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Blog</h4>
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" id="title" type="text">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="category">Category (<a class="text-pink" href="#"> Add New Category </a>)</label>
                                <select class="form-select" id="category">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="imageUpload">Main Image</label>
                            <input class="form-control" id="imageUpload" type="file" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <img id="imagePreview" src="#" alt="Image Preview" style="display: block; max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Main Content</h4>
                    <div id="snow-editor" style="height: 500px;"></div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="text-end">
                <button class="btn btn-success" id="updateBlog" type="submit">Submit</button>
            </div>
        </div>
    </div>

    <script>
        const id = window.location.pathname.split('/').pop();

        const setBlog = async () => {
            let res = await axios.get(`/api/v1/author/blog-post/${id}`);
            res = res.data[0];
            console.log(res);

            document.getElementById('title').value = res.title;
            document.getElementById('category').value = res.category_id;
            document.getElementById('imagePreview').src = res.main_image;
            document.getElementById('snow-editor').innerHTML = res.content;
        }

        document.addEventListener('DOMContentLoaded', function() {
            setCategories();
            setBlog();
        });

        const setCategories = async () => {
            let res = await axios.get("/api/v1/author/blog-category");
            res = res.data[0];
            let category = $("#category");

            category.empty();

            res.forEach(function(item, index) {
                let option = `<option value="${item.id}">${item.name}</option>`;
                category.append(option);
            })
        }


        document.getElementById('updateBlog').addEventListener('click', async function() {
            let title = document.getElementById('title').value;
            let category = document.getElementById('category').value;
            let mainImage = document.getElementById('imageUpload').files[0];
            let mainContent = document.getElementById('snow-editor').innerHTML;

            let formData = new FormData();
            formData.append('title', title);
            formData.append('category_id', category);
            if(mainImage) {
                formData.delete('main_image');
            }
            formData.append('author_id', JSON.parse(localStorage.getItem('user')).id);
            formData.append('content', mainContent);

            let res = await axios.post("/api/v1/author/blog-post", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            console.log(res.data);
            if (res.data.success == true) {
                window.location.href = "{{ route('front.author.blog.index') }}";
            }
        });

        document.getElementById('imageUpload').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('imagePreview');
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
