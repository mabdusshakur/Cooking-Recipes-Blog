<div class="blog-section blog-single recepi-single padding-tb bg-body">
     <div class="container">
         <div class="section-wrapper">
             <div class="row justify-content-center">
                 <div class="col-lg-8 col-12">
                     <article>
                         <div class="post-item" id="recipe-list">
                                    <!-- Recipes will be injected here -->

                         </div>

                         <div class="product">
                            <h4 class="title-border">Related Recipes</h4>
                            <div class="section-wrapper">
                                <div class="row g-0">
                                    <!-- Related recipes will be injected here -->
                                </div>
                            </div>
                        </div>
                        
                     </article>
                 </div>
                 <div class="col-lg-4 col-md-7 col-12">
                     <aside>
                         <div class="widget widget-author">
                             <div class="widget-header">
                                 <h5>Meet Author</h5>
                             </div>
                             <div class="widget-wrapper">
                                 <div class="admin-thumb">
                                     <img src="{{ asset('user/assets/images/chef/author/08.jpg')}}" alt="author">
                                 </div>
                                 <div class="admin-content">
                                     <p>Hey hey! I'm Lindsay and this is my websiteThanks for being here! I'm a yoga instructor I write about all of those...</p>
                                     <div class="scocial-media">
                                         <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                         <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                         <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                         <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="widget recipe-categori" >
                            <div class="widget-header">
                                <h5>Popular Categories</h5>
                            </div>
                            <div class="widget-wrapper section-wrapper">
                                <div class="row justify-content-center g-0" id="category-list">
                                    <!-- Categories will load dynamically here -->
                                </div>
                            </div>
                            
                        </div>
                     </aside>
                 </div>
             </div>
         </div>
     </div>
 </div>

 @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            await fetchCategories();
            const recipeId = window.location.pathname.split('/').pop(); 
            await fetchRecipeById(recipeId);
            await loadRelatedRecipes(recipeId);
        });

        async function fetchCategories() {
    const categoryListContainer = document.getElementById('category-list');
    categoryListContainer.innerHTML = ''; 

    try {
        const res = await axios.get('{{ url('/api/v1/recipe-category') }}');
        const categories = res.data[0]; 
        console.log(categories);

        if (categories && categories.length > 0) {
            categories.forEach((category) => {
                const categoryName = category.name || 'Unknown'; 
                const categoryImage = category.image || 'default-image.jpg'; 

                const categoryHTML = `
                    <div class="col-6">
                        <div class="recipe-item">
                            <div class="recipe-thumb">
                                <a href="#"><img src="${categoryImage}" alt="${categoryName}"></a>
                            </div>
                            <div class="recipe-content">
                                <a href="#">${categoryName}</a>
                            </div>
                        </div>
                    </div>
                `;
                categoryListContainer.innerHTML += categoryHTML;
            });
        } else {
            categoryListContainer.innerHTML = '<p>No categories available</p>';
        }
    } catch (error) {
        console.error('Error fetching categories:', error);
        categoryListContainer.innerHTML = '<p>Error loading categories. Please try again later.</p>';
    }
}




async function fetchRecipeById(recipeId) {
    const recipeListContainer = document.getElementById('recipe-list');
    recipeListContainer.innerHTML = ''; 

    try {
        const res = await axios.get(`{{ url('/api/v1/recipes') }}/${recipeId}`);
        const data = res.data; 
        console.log(data);
     
        const recipeData = data[0]; 

        if (recipeData) {
            const recipeHTML = `
                <div class="post-inner">
                    <div class="post-thumb">
                        <div id="demo" class="carousel slide vert">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="sli-recepi-thumb">
                                        <img src="${recipeData.main_image }" alt="recipe-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-content">
                        <div class="meta-tag">
                            <div class="categori">
                                <a href="#">${recipeData.category?.name }</a>
                            </div>
                        </div>
                        <h4>${recipeData.title}</h4>
                        <p>${recipeData.long_description}</p>
                        <div class="make-product">
                            <div class="left">
                                <h6>Ingredients</h6>
                                <ul>
                                    ${recipeData.ingredients.map(ingredient => `<li>${ingredient.name}</li>`).join('')}
                                </ul>
                            </div>
                            <div class="right">
                                <h6>Nutritional Value</h6>
                                <ul>
                                    ${recipeData.NutritionalValues.map(nutrition => `
                                        <li>
                                            <span class="left"><i class="icofont-double-right"></i>${nutrition.name}</span>
                                            <span class="right">${nutrition.amount}</span>
                                        </li>
                                    `).join('')}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            recipeListContainer.innerHTML = recipeHTML;
        } else {
            recipeListContainer.innerHTML = '<p>Recipe not found.</p>';
        }
    } catch (error) {
        console.error('Error fetching the recipe:', error);
        recipeListContainer.innerHTML = '<p>Error loading the recipe. Please try again later.</p>';
    }
}
async function loadRelatedRecipes(recipeId) {
    const relatedRecipesContainer = document.querySelector('.product .row');
    relatedRecipesContainer.innerHTML = ''; 

    try {
        const res = await axios.get(`{{ url('/api/v1/recipes') }}/${recipeId}/related`);
        const { data } = res.data;

        if (data && data.length > 0) {
            data.forEach(recipe => {
                const recipeHTML = `
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img src="${recipe.main_image || '{{ asset('user/assets/images/food-recipe/default.jpg') }}'}" alt="${recipe.title}">
                            </div>
                            <div class="product-content">
                                <h6><a href="/recipes/${recipe.id}">${recipe.title}</a></h6>
                            </div>
                        </div>
                    </div>
                `;
                relatedRecipesContainer.innerHTML += recipeHTML;
            });
        } else {
            relatedRecipesContainer.innerHTML = '<p>No related recipes found.</p>';
        }
    } catch (error) {
        console.error('Error loading related recipes:', error);
        relatedRecipesContainer.innerHTML = '<p>Error loading related recipes. Please try again later.</p>';
    }
}



    </script>
 @endsection
