
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('back/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('back/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('all_settings')}}" id="settings_sidebar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Settings</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home Page
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('banners.index')}}" id="banners_sidebar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banners</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('about-us.index')}}" id="about_sidebar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('service-categories.index')}}" id="service_categories_sidebar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('services.index')}}" id="services_sidebar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Services</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="{{route('image_gallery_index')}}" id="gallery_sidebar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gallery</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="{{route('experts.index')}}" id="experts_sidebar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Experts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('promo')}}" id="promo_sidebar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Promo Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('blogs.index')}}" id="blogs_sidebar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blogs</p>
                </a>
              </li>
            </ul>
          </li>
            </ul>
            <li class="nav-item">
          <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       
                                
            
              <i class="nav-icon fas fa-sign-out-alt text-info"></i>
              <p> {{ __('Logout') }}</p>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </a>
          </li>
          </li>
          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>