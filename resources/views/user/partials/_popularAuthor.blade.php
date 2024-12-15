<section class="popular-chef padding-tb" style="background-color: #fafeff;">
    <div class="container">
        <div class="section-header">
            <h2>Popular Authors</h2>
            <p>Completely network impactful users whereas next-generation applications engage out thinking via
                tactical action.</p>
        </div>
        <div class="section-wrapper">
            <div class="row justify-content-center popular-authors">

            </div>
        </div>
    </div>
</section>

<script>
    axios.get('/api/v1/popular-authors').then((response) => {
        const authors = response.data[0];
        console.log(authors);
        const popularAuthors = document.querySelector('.popular-authors');
        authors.forEach((data) => {
            popularAuthors.innerHTML += `
              <div class="col-xl-4 col-md-6 col-12">
                         <div class="chef-item">
                              <div class="chef-inner">
                                   <div class="chef-thumb">
                                        <img src="{{ asset('user/assets/images/chef/01.jpg') }}" alt="food-chef">
                                   </div>
                                   <div class="chef-content">
                                        <div class="chef-author">
                                             <a href="#">
                                                  <img src="${data.author.main_image}" alt="chef-author">
                                             </a>
                                        </div>
                                        <h5><a href="#">${data.author.user.name}</a></h5>
                                        <div class="scocial-share">
                                             <a href="#" class="food-btn"><span><i class="icofont-ui-user"></i>
                                                       View Profile</span></a>
                                        </div>
                                        <div class="chef-footer">
                                             <div class="chef-earn chef-con">
                                                  <h6>${data.author.recipes_count}</h6>
                                                  <a href="#">Recipes</a>
                                             </div>
                                             <div class="chef-menu chef-con">
                                                  <h6>${data.author.blog_posts_count}</h6>
                                                  <a href="#">Blog</a>
                                             </div>
                                             <div class="chef-recipe chef-con">
                                                  <h6>${data.visits}</h6>
                                                  <a href="#">Reach</a>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>`;
        });


    }).catch((error) => {
        console.log(error.response);
    });
</script>
