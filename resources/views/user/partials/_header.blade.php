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
                         <li class="sign-in-tab">
                             <a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ route('front.auth.sign-in') }}">Sign In</a>
                         </li>
                     </ul>
                     
               </div>
          </div>
     </div>
</header>

<script>
     document.addEventListener('DOMContentLoaded', function() {
          const user = JSON.parse(localStorage.getItem('user'));
          const signInTab = document.querySelector('.sign-in-tab');
          if(user && user.name) {
               signInTab.innerHTML = `<a href="{{ route('front.user.profile') }}">{ Profile }</a>`;
          }
     });
</script>