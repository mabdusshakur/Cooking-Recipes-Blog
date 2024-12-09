<header class="header-section d-xl-block d-none">
     <div class="container-fluid">
          <div class="header-area">
               <div class="logo">
                    <a href="index.html">Cooking & Recipes</a>
               </div>
               <div class="main-menu">
                    <ul>
                         <li>
                              <a class="active" href="{{ url('/')}}">Home</a>
                         </li>
                         <li>
                              <a href="{{ url('recipes')}}">Recipes</a>
                         </li>
                         <li>
                              <a href="{{ url('blogs') }}">Blogs</a>
                         </li>
                         <li>
                              <a href="{{ url('about')}}">About Us</a>
                         </li>
                    </ul>
               </div>
               <div class="author-option">
                    <div class="author-area">
                         <div class="author-account">
                              <div class="author-icon">
                                   <img src="{{ asset('user/assets/images/chef/author/08.jpg') }}" alt="author">
                              </div>
                              <div class="author-select">
                                   <select name="author-select" id="author-select">
                                        <option value="1">My Account </option>
                                        <option value="2">Log Out </option>
                                   </select>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</header>