@extends('layouts.author')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Blog</h4>
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" id="title" type="text">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="category">Category (<a class="text-pink" href="{{ route('front.author.blog.category.index') }}"> Add New Category </a>)</label>
                                <select class="form-select" id="category">
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
                            <label class="form-label" for="blogMainImage">Main Image</label>
                            <input class="form-control" id="blogMainImage" type="file" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 100%; height: auto;">
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
                <button class="btn btn-success" id="submitBlog" type="submit">Submit</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setCategories();
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


        document.getElementById('submitBlog').addEventListener('click', async function() {
            let title = document.getElementById('title').value;
            let category = document.getElementById('category').value;
            let mainImage = document.getElementById('blogMainImage').files[0];
            let mainContent = document.getElementById('snow-editor').innerHTML;

            let formData = new FormData();
            formData.append('title', title);
            formData.append('category_id', category);
            formData.append('main_image', mainImage);
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


        document.getElementById('blogMainImage').addEventListener('change', function(event) {
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
