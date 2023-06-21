<div class="vertical-menu">

<div data-simplebar class="h-100">


    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{route('dashboard')}}" class="waves-effect">
                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-calendar-2-line"></i>
                    <span>Home Slider</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('home.slider.edit')}}">Home Slider setup</a></li>
                </ul>
            </li>
            
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-layout-3-line"></i>
                    <span>About </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('about.edit')}}">About setup</a></li>
                    <li><a href="{{route('about.multi.image')}}">multi image setup</a></li>
                    <li><a href="{{route('all.multi.image')}}">All multi image </a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class=" fas fa-user sm"></i>
                <span>Portfolio </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route('add.portfolio')}}">Add Portfolio</a></li>
                <li><a href="{{route('all.portfolio')}}">All Portfolios  </a></li>
            </ul>
            </li>
            
            
            <li class="menu-title">Pages</li>
            
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class=" fas fa-list"></i>
                    <span>Blog Category </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('all.category')}}">All Blog Category</a></li>
                    <li><a href="{{route('add.blog.category')}}">Add Blog Category</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-poll-h"></i>
                    <span>Blog  </span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('all.blogs')}}">All Blog </a></li>
                    <li><a href="{{route('add.blog')}}">Add Blog </a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-profile-line"></i>
                    <span>Footer</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('footer.setup')}}">Footer setup</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="far fa-paper-plane"></i>
                    <span>Contact Messages</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('contact.message')}}">Contact Messages</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>