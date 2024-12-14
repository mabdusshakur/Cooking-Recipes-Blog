<section class="popular-foods padding-tb" style="background-color: #fafeff;">
    <div class="container">
        <div class="section-header">
            <h2>Most Popular Recipes</h2>
            <p>Completely network impactful users whereas next-generation applications engage out thinking via tactical action.</p>

            <div class="food-category">
                <div class="food-box" style="padding: 15px;">
                    <div class="section-wrapper">
                        <div class="food-slider style-2">
                            <div class="swiper-wrapper" id="category-list">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-wrapper">
            <div class="row" id="recipe-list">

            </div>
        </div>
    </div>
</section>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            await fetchCategories();
            await fetchRecipes();
        });

        async function fetchCategories() {
            const categoryListContainer = document.getElementById('category-list');
            categoryListContainer.innerHTML = '';

            try {
                const res = await axios.get('{{ url('/api/v1/recipe-category') }}');
                const data = res.data[0];

                if (data && data.length > 0) {
                    data.forEach((category) => {
                        const categoryName = category.name || 'Unknown';
                        const categoryHTML = `
                            <div class="swiper-slide">
                                <div class="food-item">
                                    <div class="food-thumb">
                                        <a href="#"><img src="default-image.jpg" alt="${categoryName}"></a>
                                    </div>
                                    <div class="food-content">
                                        <a href="#">${categoryName}</a> 
                                    </div>
                                </div>
                            </div>
                        `;
                        categoryListContainer.innerHTML += categoryHTML;
                    });

                    new Swiper(".food-slider", {
                        slidesPerView: 3,
                        spaceBetween: 10,
                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                        },
                    });
                }
            } catch (error) {
                console.error('Error fetching categories:', error);
            }
        }

        async function fetchRecipes() {
            const recipeListContainer = document.getElementById('recipe-list');
            recipeListContainer.innerHTML = '';

            try {
                const res = await axios.get('{{ url('/api/v1/recipes') }}');
                const data = res.data;

                if (data.data && data.data.length > 0) {
                    data.data.forEach((recipe) => {
                        const recipeHTML = `
                            <div class="col-xl-4 col-md-6 col-12">
                                <div class="p-food-item">
                                    <div class="p-food-inner">
                                        <div class="p-food-thumb">
                                            <img src="{{ asset('') }}${recipe.main_image}" alt="${recipe.title}">
                                            <span class="bg-success" style="padding: 8px 7px; border-radius: 10px; top: 6px; left: 6px;">
                                                ${recipe.category.name}
                                            </span>
                                        </div>
                                        <div class="p-food-content">
                                            <h6><a href="#">${recipe.title}</a></h6>
                                            <p>${recipe.short_description}</p>
                                            <div class="p-food-group">
                                                <a href="{{ url('/single-recipe') }}/${recipe.id}" class="food-btn">
                                                    <span>View Recipe</span>
                                                </a>
                                            </div>
                                            <div class="d-flex my-2 gap-2 text-dark justify-content-center">
                                                <div class="left">
                                                    <i class="icofont-stopwatch"></i>
                                                    ${recipe.prepare_time || 'N/A'}
                                                </div>

                                                <div class="vr"></div>

                                                <div class="right">
                                                    <i class="icofont-food-basket"></i>
                                                    ${recipe.difficulty || 'Unknown'}
                                                </div>

                                                <div class="vr"></div>

                                                <div class="middle">
                                                    <i class="icofont-spoon-and-fork"></i>
                                                    ${recipe.serving || 'N/A'} SERVES
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        recipeListContainer.innerHTML += recipeHTML;
                    });
                }
            } catch (error) {
                console.error('Error fetching recipes:', error);
            }
        }
    </script>
@endsection
