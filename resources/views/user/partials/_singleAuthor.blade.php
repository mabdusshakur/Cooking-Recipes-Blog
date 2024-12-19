<section class="page-header">
    <div class="container">
        <div class="page-title text-center">
            <h3 id="author-name"></h3>
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Authors</a></li>
                <li id="breadcrumb-author-name"></li> 
            </ul>
        </div>
    </div>
</section>
<!-- Page Header Section Ending Here -->

<!-- Popular Home Chef Section Start Here -->
<div class="popular-chef single">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-12">
                    <article>
                        <div class="chef-item">
                            <div class="chef-inner">
                                <div class="chef-thumb bg-dark"></div>
                                <div class="chef-content" id="author-details">
                                    <!-- Author details will be dynamically inserted here -->
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center vh-100 p-5">
                            <h3 class="text-center mb-4">Recipes</h3>

                            <div id="recipe" class="w-100 p-4">
                                <div class="recent-recipe">
                                    <div class="section-wrapper">
                                        <div class="row justify-content-center flex-wrap" id="recipe-list">
                                            <!-- Recipe cards will be inserted dynamically here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', async function() {
    const authorId = window.location.pathname.split('/').pop();
    await loadAuthorDetails(authorId);
    await loadAuthorRecipes(authorId);
});

async function loadAuthorDetails(authorId) {
    try {
        const response = await axios.get(`{{ url('/api/v1/authors/') }}/${authorId}`);
        const author = response.data[0]; 
        console.log(author);
        
        document.getElementById('author-name').textContent = author.name;
        document.getElementById('breadcrumb-author-name').textContent = author.name;

        const AuthorContainer = document.getElementById('author-details');
        AuthorContainer.innerHTML = "";

        if (author) { 
            AuthorContainer.innerHTML = `
                <div class="chef-author">
                    <img src="${author.image || 'default_image.jpg'}" alt="${author.name}" />
                </div>
                <div class="chef-desc">
                    <div class="chef-desc-top">
                        <div class="title">
                            <h5>${author.name}</h5>
                        </div>
                        <div class="scocial-share">
                            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                            <a href="#" class="food-btn"><span><i class="icofont-ui-user"></i> follow</span></a>
                        </div>
                    </div>
                    <div class="chef-desc-middle">
                        <p>${author.mini_bio}</p>
                        <ul>
                            <li><span>Joined</span>: ${author.created_at}</li>
                        </ul>
                    </div>
                    <div class="chef-footer">
                        <div class="chef-menu chef-con">
                            <h6>${author.recipes_count}</h6>
                            <a href="#">Recipes</a>
                        </div>
                        <div class="chef-recipe chef-con">
                            <h6>${author.blog_posts_count}</h6>
                            <a href="#">Blogs</a>
                        </div>
                    </div>
                </div>
            `;
        }
    } catch (error) {
        console.error("Error loading author details:", error); 
    }
}

async function loadAuthorRecipes(authorId) {
    try {
        const response = await axios.get(`{{ url('/api/v1/authors') }}/${authorId}`);
        const recipes = response.data[0].recipes; 
        const recipeContainer = document.getElementById("recipe-list");
        recipeContainer.innerHTML = recipes.length
            ? recipes.map(recipe => `
                <div class="col-md-6 col-lg-4 col-12">
                    <div class="recipe-item card shadow-sm mb-4">
                        <div class="recipe-thumb">
                            <a href="/single-recipe/${recipe.id}">
                                <img src="${recipe.image}" class="card-img-top" alt="${recipe.title}" />
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="meta-tag mb-3">
                                <div class="categori text-primary">
                                    <a>${recipe.category.name}</a>
                                </div>
                            </div>
                            <h6 class="card-title">
                                <a href="/single-recipe/${recipe.id}">${recipe.title}</a>
                            </h6>
                            <div class="meta-post mt-4">
                                <div class="d-flex gap-2">
                                    <div class="text-muted">
                                        <i class="icofont-stopwatch"></i> ${recipe.prepare_time}
                                    </div>
                                    <div class="vr"></div>
                                    <div class="text-muted">
                                        <i class="icofont-food-basket"></i> ${recipe.difficulty}
                                    </div>
                                    <div class="vr"></div>
                                    <div class="text-muted">
                                        <i class="icofont-spoon-and-fork"></i> ${recipe.serving} SERVES
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('')
            : `<p class="text-center">No recipes found for this author.</p>`;
    } catch (error) {
        console.error("Error loading recipes:", error);
        document.getElementById("recipe-list").innerHTML = `<p class="text-danger">Unable to load recipes. Please try again later.</p>`;
    }
}
</script>
