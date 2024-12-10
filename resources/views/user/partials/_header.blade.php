<header class="header-section d-xl-block d-none">
     <div class="container-fluid">
          <div class="header-area">
               <div class="logo">
                    <a href="{{ url('/') }}">Cooking & Recipes</a>
               </div>
               <div class="main-menu">
                    <ul>
                         <li>
                             <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                         </li>
                         <li>
                             <a class="{{ request()->is('recipes') || request()->is('single-recipe') ? 'active' : '' }}" href="{{ url('recipes') }}">Recipes</a>
                         </li>
                         <li>
                              <a class="{{ request()->is('blog') || request()->is('single-blog') ? 'active' : '' }}" href="{{ url('blog') }}">Blogs</a>
                         </li>
                         <li>
                             <a class="{{ request()->is('authors') ? 'active' : '' }}" href="{{ url('authors') }}">Authors</a>
                         </li>
                         <li>
                             <a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ url('about') }}">About Us</a>
                         </li>
                         <li>
                             <a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ route('front.auth.sign-in') }}">Sign In</a>
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