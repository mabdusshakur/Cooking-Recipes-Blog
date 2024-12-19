<section class="popular-chef style-2 mb-5">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center" id="author-list">
                <!-- Author details will be inserted here dynamically -->
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', async function() {
        await loadAllAuthors();
    });

    async function loadAllAuthors() {
        const authorListContainer = document.getElementById('author-list');
        authorListContainer.innerHTML = '';

        try {
            const res = await axios.get('{{ url('/api/v1/authors') }}');
            const authors = res.data[0];

            // const authors = responseData;
            // console.log(authors);
            

            if (authors && authors.length > 0) {
                authors.forEach((author) => {
                    const authorHTML = `
                        <div class="col-xl-4 col-lg-6 col-12">
                            <div class="chef-item">
                                <div class="chef-inner">
                                    <div class="chef-content">
                                        <div class="chef-author">
                                            <a href="#">
                                                <img src="${author.main_image || 'default-image.jpg'}" alt="author-profile">
                                            </a>
                                        </div>
                                        <h5><a href="#">${author.name || 'Unknown Author'}</a></h5>
                                        <p>${author.profile_title || 'Author'}</p>
                                        <div class="scocial-share">
                                            <a href="single-author/${author.id}" class="food-btn"><span><i class="icofont-ui-user"></i> Profile</span></a>
                                        </div>
                                        <div class="chef-footer">
                                            <div class="chef-con">
                                                <h6>${author.blog_posts_count || 0}</h6>
                                                <a href="#">Blogs</a>
                                            </div>
                                            <div class="chef-con">
                                                <h6>${author.recipes_count || 0}</h6>
                                                <a href="#">Recipes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    authorListContainer.innerHTML += authorHTML;
                });
            } else {
                authorListContainer.innerHTML = '<p>No authors available</p>';
            }
        } catch (error) {
            console.error('Error fetching authors:', error);
            authorListContainer.innerHTML = '<p>Error loading authors. Please try again later.</p>';
        }
    }
</script>
