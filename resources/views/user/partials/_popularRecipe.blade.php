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
                <div class="d-none spinner-border text-danger" role="status" id="spinner">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', async function() {
        await fetchCategories();
        await fetchRecipes();
    });

    // const showSpinner = () => {
    //     document.getElementById('spinner').classList.remove('d-none');
    // }
    // const hideSpinner = () => {
    //     document.getElementById('spinner').classList.add('d-none');
    // }
    

    async function fetchCategories() {
        const categoryListContainer = document.getElementById('category-list');
        categoryListContainer.innerHTML = '';

        try {
            const response = await axios.get('{{ url('/api/v1/recipe-category') }}');
            const data = response.data[0];
            console.log(data);

            if (data && data.length > 0) {
                data.forEach(category => {
                    const categoryName = category.name || 'Unknown';
                    const categoryHTML = `
                        <div class="swiper-slide">
                            <div class="food-item">
                                <div class="food-thumb">
                                    <a data-category-id="${category.id}" class="category-link" style="cursor : pointer;">
                                        <img src="default-image.jpg" alt="${categoryName}">
                                    </a>
                                </div>
                                <div class="food-content">
                                    <a data-category-id="${category.id}" class="category-link" style="cursor : pointer;">
                                        ${categoryName}
                                    </a>
                                </div>
                            </div>
                        </div>
                    `;
                    categoryListContainer.innerHTML += categoryHTML;
                });

                // Add click event listeners for category links
                document.querySelectorAll('.category-link').forEach(link => {
                    link.addEventListener('click', function(event) {
                        event.preventDefault();
                        const categoryId = this.getAttribute('data-category-id');
                        fetchRecipes(categoryId);
                    });
                });

                // Swiper initialization
                new Swiper(".food-slider", {
                    slidesPerView: 3,
                    spaceBetween: 10,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                });
            } else {
                categoryListContainer.innerHTML = '<p>No categories available at this time.</p>';
            }
        } catch (error) {
            console.error('Error fetching categories:', error);
            categoryListContainer.innerHTML = '<p>Unable to load categories. Please try again later.</p>';
        }
    }

    async function fetchRecipes(categoryId = null) {
        // showSpinner();
        
        const recipeListContainer = document.getElementById('recipe-list');
        recipeListContainer.innerHTML = '';

        let url = '{{ url('/api/v1/recipes') }}';
        if (categoryId) {
            url += `?category_id=${categoryId}`;
        }

        try {
            const response = await axios.get(url);
            const data = response.data;

            if (data.data && data.data.length > 0) {
                data.data.forEach(recipe => {
                    const recipeHTML = `
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="p-food-item">
                                <div class="p-food-inner">
                                    <div class="p-food-thumb">
                                        <img src="${recipe.main_image}" alt="${recipe.title}">
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
            } else {
                recipeListContainer.innerHTML = '<p>No recipes available at this time.</p>';
            }
            // hideSpinner();
        } catch (error) {
            console.error('Error fetching recipes:', error);
            recipeListContainer.innerHTML = '<p>Unable to load recipes. Please try again later.</p>';
        }
    }
</script>
