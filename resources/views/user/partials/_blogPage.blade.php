<div class="blog-section blog-page padding-tb">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <article>

                        <div class="post-item" id="blog-posts">

                        </div>

                        <div class="paginations">
                            <ul class="d-flex justify-content-center flex-wrap" id="pagination-links">

                            </ul>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-7 col-12">
                    <aside>
                        <div class="widget widget-search">
                            <div class="search-wrapper">
                                <input name="s" type="text" placeholder="Your Search...">
                                <button type="submit"><i class="icofont-search-2"></i></button>
                            </div>
                        </div>

                        <div class="widget widget-category">
                            <div class="widget-header">
                                <h5>post category</h5>
                            </div>
                            <ul class="widget-wrapper" id="blog-category">

                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', async function() {
        await loadCategories();
        const params = new URLSearchParams(window.location.search);
        const categoryId = params.get('category_id');
        const page = params.get('page') || 1;

        loadBlogPosts(categoryId, page);
    });

    async function loadCategories() {
        const categoryListContainer = document.getElementById('blog-category');
        categoryListContainer.innerHTML = '';

        try {
            const res = await axios.get('{{ url('/api/v1/blog-category') }}');
            const categories = res.data[0];

            if (categories && categories.length > 0) {
                categories.forEach((category) => {
                    const categoryName = category.name || 'Unknown';
                    const categoryHTML = `
                        <li>
                            <a href="#" class="d-flex flex-wrap justify-content-between" data-category-id="${category.id}">
                                <span><i class="icofont-double-right"></i>${categoryName}</span><span>${category.blog_posts_count}</span>
                            </a>
                        </li>
                    `;
                    categoryListContainer.innerHTML += categoryHTML;
                });

                const categoryLinks = document.querySelectorAll('[data-category-id]');
                categoryLinks.forEach(link => {
                    link.addEventListener('click', function(event) {
                        event.preventDefault();

                        categoryLinks.forEach(item => item.classList.remove('active'));
                        this.classList.add('active');

                        const categoryId = this.getAttribute('data-category-id');

                        // Update the URL with the selected category
                        window.history.pushState({
                            category_id: categoryId
                        }, '', `?category_id=${categoryId}&page=1`);

                        loadBlogPosts(categoryId, 1);
                    });
                });
            } else {
                categoryListContainer.innerHTML = '<p>No categories available</p>';
            }
        } catch (error) {
            console.error('Error fetching categories:', error);
            categoryListContainer.innerHTML = '<p>Error loading categories. Please try again later.</p>';
        }
    }

    async function loadBlogPosts(categoryId = null, page = 1) {
        const blogPostsContainer = document.getElementById('blog-posts');
        const paginationContainer = document.getElementById('pagination-links');
        blogPostsContainer.innerHTML = '';
        paginationContainer.innerHTML = '';

        try {
            let url = `{{ url('/api/v1/blog-post') }}?page=${page}`;
            if (categoryId) {
                url += `&category_id=${categoryId}`;
            }

            const res = await axios.get(url);
            const blogPosts = res.data.data;
            const pagination = res.data.pagination;

            if (!blogPosts || blogPosts.length === 0) {
                blogPostsContainer.innerHTML = '<p>No blogs available in this category.</p>';
                return;
            }

            blogPosts.forEach(post => {
                const postHTML = `
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="/single-blog/${post.id}">
                                    <img src="${post.main_image}" alt="${post.title}">
                                </a>
                            </div>
                            <div class="post-content">
                                <h4><a href="/single-blog/${post.id}">${post.title}</a></h4>
                                <div class="meta-post">
                                    <ul>
                                        <li>
                                            <i class="icofont-calendar"></i>
                                            <a href="#" class="date">${new Date(post.created_at).toDateString()}</a>
                                        </li>
                                        <li>
                                            <i class="icofont-ui-user"></i>
                                            <a href="#" class="author">${post.author.name}</a>
                                        </li>
                                    </ul>
                                </div>
                                <p>${stripHtmlTags(post.content).substring(0, 150)}...</p>
                                <a href="/single-blog/${post.id}" class="food-btn"><span>Read more</span></a>
                            </div>
                        </div>
                    </div>
                `;
                blogPostsContainer.innerHTML += postHTML;
            });

            // Render Pagination
            if (pagination && pagination.last_page > 1) {
                for (let i = 1; i <= pagination.last_page; i++) {
                    const paginationLink = document.createElement('li');
                    paginationLink.innerHTML = `
            <a href="#" class="page-link" data-page="${i}">${i}</a>
        `;

                    if (i === pagination.current_page) {
                        paginationLink.querySelector('.page-link').classList.add('active');
                    }

                    // Add click event to pagination links
                    paginationLink.querySelector('.page-link').addEventListener('click', (event) => {
                        event.preventDefault();
                        loadBlogPosts(categoryId, i);

                        // Update the URL with the new page number
                        window.history.pushState({
                            page: i
                        }, '', `?category_id=${categoryId || ''}&page=${i}`);
                    });

                    paginationContainer.appendChild(paginationLink);
                }
            }


        } catch (error) {
            console.error('Error loading blog posts:', error);
            blogPostsContainer.innerHTML = '<p>There was an issue loading the blog posts. Please try again.</p>';
        }
    }

    // Function to strip HTML tags
    function stripHtmlTags(str) {
        if (!str) return '';
        return str.replace(/<\/?[^>]+(>|$)/g, '');
    }
</script>
