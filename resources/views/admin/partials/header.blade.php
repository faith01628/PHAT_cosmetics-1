  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="/" class="nav-link" target="_blank">Website</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link">Contact</a>
          </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                      <i class="fas fa-search"></i>
                  </button>
              </div>
          </div>
      </form>

      <!-- Right navbar links -->
      
      <ul class="navbar-nav ml-auto">
          <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">My Profile</a>
                  <a class="dropdown-item" href="{{ URL::to('/logout') }}">
                    {{ __('Logout') }}
                      
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </div>
      </ul>
  </nav>
  <!-- /.navbar -->
