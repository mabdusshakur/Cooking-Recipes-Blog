@extends('layouts.author')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Recipe</h4>
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" id="title" type="text">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="category">Category (<a href="{{route('front.author.recipe.category.index')}}" class="text-pink"> Add New Category </a>)</label>
                                <select class="form-select" id="category">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="preparetime">Prepare Time</label>
                                <input class="form-control" id="preparetime" type="text">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="difficulty">Difficulty</label>
                                <input class="form-control" id="difficulty" type="text">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="serving">Serving</label>
                                <input class="form-control" id="serving" type="number">
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
                            <label class="form-label" for="recipeMainImage">Main Image</label>
                            <input class="form-control" id="recipeMainImage" type="file" accept="image/*">
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
                    <h4 class="header-title">Short Description</h4>
                    <textarea id="recipe-short-description" class="form-control" rows="10"></textarea>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Long Description</h4>
                    <div id="snow-editor" style="height: 500px;"></div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="text-end">
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('recipeMainImage').addEventListener('change', function(event) {
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
