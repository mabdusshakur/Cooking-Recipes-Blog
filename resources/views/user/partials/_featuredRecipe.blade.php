<div class="container mt-4">
    <div class="section-header text-center">
        <h2>Featured Recipes</h2>
        <p>
            Explore the best recipes selected just for you!
        </p>
    </div>

    <div class="section-wrapper">
        <div class="swiper featured-swiper">
            <div class="swiper-wrapper" id="featured-recipes">


            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', async function () {
        await fetchFeaturedRecipes();
    });

    async function fetchFeaturedRecipes() {
    const featuredRecipesContainer = document.getElementById('featured-recipes');
    featuredRecipesContainer.innerHTML = '';

    try {
        const response = await axios.get('{{ url("/api/v1/featured-recipes") }}');
        const data = response.data; 

        if (data.data && data.data.length > 0) {
            data.data.forEach(recipe => {
                const recipeHTML = `
                    <div class="swiper-slide">
                        <div class="col-lg-6 col-12">
                            <div class="p-food-item style-2">
                                <div class="p-food-inner">
                                    <div class="p-food-thumb">
                                        <img src="${recipe.main_image}" alt="${recipe.title || 'Recipe'}">
                                        <span class="bg-success" style="padding: 8px 7px; border-radius: 10px; top: 6px; left: 6px;">
                                            ${recipe.category?.name }
                                        </span>
                                    </div>
                                    <div class="p-food-content">
                                        <h6><a href="#">${recipe.title}</a></h6>
                                        <p>${recipe.short_description}</p>
                                        <div class="p-food-group">
                                            <span>By: ${recipe.author?.name}</span>
                                            <a href="/single-recipe/${recipe.id}" class="food-btn"><span>View Recipe</span></a>
                                        </div>
                                        <div class="d-flex gap-2 text-dark justify-content-center mt-2">
                                            <div>
                                                <i class="icofont-stopwatch"></i> ${recipe.prepare_time}
                                            </div>
                                            <div class="vr"></div>
                                            <div>
                                                <i class="icofont-food-basket"></i> ${recipe.difficulty}
                                            </div>
                                            <div class="vr"></div>
                                            <div>
                                                <i class="icofont-spoon-and-fork"></i> ${recipe.serving} Serves
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                featuredRecipesContainer.innerHTML += recipeHTML;
            });
        } else {
            featuredRecipesContainer.innerHTML = `<p class="text-center">No featured recipes available.</p>`;
        }
    } catch (error) {
        console.error('Error fetching featured recipes:', error);
        featuredRecipesContainer.innerHTML = `<p class="text-center text-danger">Failed to load recipes. Please try again later.</p>`;
    }
}

</script>

