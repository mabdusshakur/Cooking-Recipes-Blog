<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li>
                    <a href="index.html">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="#email" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-outline"></i>
                        <span> Blogs </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="email">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('front.author.blog.category.index') }}">Category</a>
                            </li>
                            <li>
                                <a href="{{route("front.author.blog.index")}}">Blog</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarTasks" data-bs-toggle="collapse">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span> Recipes </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTasks">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('front.author.recipe.category.index') }}">Category</a>
                            </li>
                            <li>
                                <a href="{{ route('front.author.recipe.index') }}">Recipe</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>