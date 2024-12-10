@extends('layouts.author')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Recipe</h4>
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input class="form-control" id="title" type="text">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="category">Category (<a class="text-pink" href="{{ route('front.author.recipe.category.index') }}"> Add New Category </a>)</label>
                                <select class="form-select" id="category">
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="prepare_time">Prepare Time</label>
                                <input class="form-control" id="prepare_time" type="text">
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Recipe</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-primary" id="add-ingredient" type="button">Add Ingredient</button>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-secondary" id="add-equipment" type="button">Add Equipment</button>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <button class="btn btn-info" id="add-nutritional-value" type="button">Add Nutritional Value</button>
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
                    <textarea class="form-control" id="recipe-short-description" rows="10"></textarea>
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
        document.addEventListener('DOMContentLoaded', function() {
            setCategories();
        });

        const setCategories = async () => {
            let res = await axios.get("/api/v1/author/recipe-category");
            res = res.data[0];
            let category = $("#category");

            category.empty();

            res.forEach(function(item, index) {
                let option = `<option value="${item.id}">${item.name}</option>`;
                category.append(option);
            })
        }

        document.getElementById('add-ingredient').addEventListener('click', function() {
            const row = document.createElement('div');
            row.classList.add('row', 'mb-3', 'ingredient-row');

            const ingredientContainer = document.createElement('div');
            ingredientContainer.classList.add('col-lg-4');

            const ingredientNameInput = document.createElement('input');
            ingredientNameInput.classList.add('form-control', 'mb-2');
            ingredientNameInput.type = 'text';
            ingredientNameInput.placeholder = 'Ingredient Name';

            const ingredientQuantityInput = document.createElement('input');
            ingredientQuantityInput.classList.add('form-control');
            ingredientQuantityInput.type = 'text';
            ingredientQuantityInput.placeholder = 'Quantity';

            ingredientContainer.appendChild(ingredientNameInput);
            ingredientContainer.appendChild(ingredientQuantityInput);

            row.appendChild(ingredientContainer);

            this.parentNode.insertBefore(row, this);
        });

        document.getElementById('add-equipment').addEventListener('click', function() {
            const row = document.createElement('div');
            row.classList.add('row', 'mb-3', 'equipment-row');

            const equipmentContainer = document.createElement('div');
            equipmentContainer.classList.add('col-lg-4');

            const equipmentNameInput = document.createElement('input');
            equipmentNameInput.classList.add('form-control');
            equipmentNameInput.type = 'text';
            equipmentNameInput.placeholder = 'Equipment Name';

            equipmentContainer.appendChild(equipmentNameInput);

            row.appendChild(equipmentContainer);

            this.parentNode.insertBefore(row, this);
        });


        document.getElementById('add-nutritional-value').addEventListener('click', function() {
            const row = document.createElement('div');
            row.classList.add('row', 'mb-3', 'nutritional-value-row');

            const nameContainer = document.createElement('div');
            nameContainer.classList.add('col-lg-4');

            const nameInput = document.createElement('input');
            nameInput.classList.add('form-control', 'mb-2');
            nameInput.type = 'text';
            nameInput.placeholder = 'Nutritional Value Name';

            nameContainer.appendChild(nameInput);

            const amountContainer = document.createElement('div');
            amountContainer.classList.add('col-lg-4');

            const amountInput = document.createElement('input');
            amountInput.classList.add('form-control', 'mb-2');
            amountInput.type = 'text';
            amountInput.placeholder = 'Amount';

            amountContainer.appendChild(amountInput);

            const calorieContainer = document.createElement('div');
            calorieContainer.classList.add('col-lg-4');

            const calorieInput = document.createElement('input');
            calorieInput.classList.add('form-control');
            calorieInput.type = 'text';
            calorieInput.placeholder = 'Calories per Gram';

            calorieContainer.appendChild(calorieInput);

            row.appendChild(nameContainer);
            row.appendChild(amountContainer);
            row.appendChild(calorieContainer);

            this.parentNode.insertBefore(row, this);
        });

        document.querySelector('button[type="submit"]').addEventListener('click', function(event) {
            event.preventDefault();

            const formData = new FormData();
            formData.append('title', document.getElementById('title').value);
            formData.append('prepare_time', document.getElementById('prepare_time').value);
            formData.append('difficulty', document.getElementById('difficulty').value);
            formData.append('serving', document.getElementById('serving').value);
            formData.append('main_image', document.getElementById('recipeMainImage').files[0]);
            formData.append('short_description', document.getElementById('recipe-short-description').value);
            formData.append('long_description', document.getElementById('snow-editor').innerHTML);
            formData.append('category_id', document.getElementById('category').value);
            formData.append('author_id', JSON.parse(localStorage.getItem('user')).id);

            document.querySelectorAll('.ingredient-row').forEach((row, index) => {
                formData.append(`ingredients[${index}][name]`, row.querySelector('input[placeholder="Ingredient Name"]').value);
                formData.append(`ingredients[${index}][quantity]`, row.querySelector('input[placeholder="Quantity"]').value);
            });

            document.querySelectorAll('.equipment-row').forEach((row, index) => {
                formData.append(`equipments[${index}][name]`, row.querySelector('input[placeholder="Equipment Name"]').value);
            });

            document.querySelectorAll('.nutritional-value-row').forEach((row, index) => {
                formData.append(`NutritionalValues[${index}][name]`, row.querySelector('input[placeholder="Nutritional Value Name"]').value);
                formData.append(`NutritionalValues[${index}][amount]`, row.querySelector('input[placeholder="Amount"]').value);
                formData.append(`NutritionalValues[${index}][calorie_per_gram]`, row.querySelector('input[placeholder="Calories per Gram"]').value);
            });

            for (const pair of formData.entries()) {
                console.log(pair[0], pair[1]);
            }

            axios.post('/api/v1/author/recipes', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(response => {
                alert('Recipe created successfully!');
                window.location.href = '{{ route('front.author.recipe.index') }}';
            }).catch(error => {
                console.error(error);
                alert('An error occurred while creating the recipe.');
            });
        });

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
