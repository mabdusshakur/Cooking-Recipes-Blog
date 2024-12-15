<div class="blog-section blog-page blog-single padding-tb">
     <div class="container">
         <div class="section-wrapper">
             <div class="row justify-content-center">
                 <div class="col-lg-8 col-12">
                     <article>
                         <div class="post-item">
                             <div class="post-inner" id="single-blog-post">
                                 {{-- blog will load --}}
                             </div>
                         </div>

                         <div class="product">
                            <h4 class="title-border">You May Also Like</h4>
                            <div class="section-wrapper">
                                <div class="row g-0" id="related-posts">
                                    <!-- Dynamic products will be loaded here -->
                                </div>
                            </div>
                        </div>
                        
                     </article>
                 </div>
                 <div class="col-lg-4 col-md-7 col-12">
                     <aside>
                         <div class="widget widget-search">
                             <div class="search-wrapper">
                                 <input type="text" name="s" placeholder="Your Search...">
                                 <button type="submit"><i class="icofont-search-2"></i></button>
                             </div>
                         </div>

                         <div class="widget widget-author">
                             <div class="widget-header">
                                 <h5>Meet Author</h5>
                             </div>
                             <div class="widget-wrapper" id="author">
                                 {{-- author will load --}}
                             </div>
                         </div>

                         <div class="widget widget-category">
                             <div class="widget-header">
                                 <h5>Blog category</h5>
                             </div>
                             <ul class="widget-wrapper" id="blog-category">
                                {{-- category will load --}}
                                
                             </ul>
                         </div>
                     </aside>
                 </div>
             </div>
         </div>
     </div>
 </div>

 @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
      
            await loadCategories();
            const postId = window.location.pathname.split('/').pop();
            await loadSingleBlogPost(postId);
            await loadAuthor(postId);
            await loadRelatedPosts(postId);


        });
        async function loadSingleBlogPost(postId) {
        const blogPostContainer = document.getElementById('single-blog-post');
        blogPostContainer.innerHTML = ''; 

        try {
            const response = await axios.get(`{{ url('/api/v1/blog-post') }}/${postId}`);
            const post = response.data[0]; 
            // console.log(post);
            

            const postHTML = `
                <div class="post-inner">
                    <div class="post-thumb">
                        <img src="${post.main_image}" alt="${post.title}">
                    </div>
                    <div class="post-content">
                        <h4>${post.title}</h4>
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
                        <p>${post.content}</p>

                      

                       <!--  <p>${post.additional_content}</p>  -->
                    </div>
                </div>
            `;

            blogPostContainer.innerHTML = postHTML;

        } catch (error) {
            console.error('Error loading the blog post:', error);
            blogPostContainer.innerHTML = '<p>Unable to load the blog post. Please try again.</p>';
        }
    }
   async function loadCategories() {
            const categoryListContainer = document.getElementById('blog-category');
            categoryListContainer.innerHTML = '';

            try {
                const res = await axios.get('{{ url('/api/v1/blog-category') }}');
                const categories = res.data[0];

                if (categories && categories.length > 0) {
                    categories.forEach((category) => {
                        const categoryName = category.name || 'Unknown';
                        const categoryImage = category.image || 'default-image.jpg';

                        const categoryHTML = `
                   <li>
                                     <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>${category.name}</span><span>06</span></a>
                                 </li>
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



    async function loadAuthor(postId) {
            const authorContainer = document.getElementById('author');
            authorContainer.innerHTML = '';

            try {
                const response = await axios.get(`{{ url('/api/v1/blog-post') }}/${postId}`);
            const post = response.data[0]; 
            console.log(post);


                if (post) {
                    const author = post.author;
                    const authorHTML = `
                <div class="admin-thumb">
                    <img src="${author.main_image}" alt="${author.name || 'Author'}">
                </div>
                <div class="admin-content">
                    <p>${author.main_bio}</p>
                    <div class="scocial-media">
                    <div class="scocial-media">
                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                        <a href="#" class="vimeo"><i class="icofont-vimeo"></i></a>
                    </div>
                    </div>
                </div>
            `;
                    authorContainer.innerHTML = authorHTML;
                } else {
                    authorContainer.innerHTML = '<p>Author details not found.</p>';
                }
            } catch (error) {
                console.error('Error loading author details:', error);
                authorContainer.innerHTML = '<p>Error loading author details. Please try again later.</p>';
            }
        }

      
    async function loadRelatedPosts(postId) {
    const relatedContainer = document.getElementById('related-posts');
    relatedContainer.innerHTML = ''; 

    try {
        const response = await axios.get(`{{ url('/api/v1/blog-post') }}/${postId}/related`);

        const relatedPosts = response.data.data; 
        console.log(relatedPosts);

        if (Array.isArray(relatedPosts) && relatedPosts.length > 0) {
            relatedPosts.forEach(post => {
                const postHTML = `
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="product-item">
                            <div class="product-thumb">
                                <img src="${post.main_image}" alt="${post.title}">
                            </div>
                            <div class="product-content">
                                <h6><a href="/single-blog/${post.id}">${post.title}</a></h6>
                            </div>
                        </div>
                    </div>
                `;
                relatedContainer.innerHTML += postHTML;
            });
        } else {
            relatedContainer.innerHTML = '<p>No related posts available at this time.</p>';
        }

    } catch (error) {
        console.error('Error loading related posts:', error);
        relatedContainer.innerHTML = '<p>Unable to load related posts at this time. Please try again later.</p>';
    }
}





    


        </script>
 @endsection