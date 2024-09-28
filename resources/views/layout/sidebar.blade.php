<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/dashboard') }}">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/doctor') }}">
            <span data-feather="file"></span>
            Doctors
          </a>
        </li>

      </ul>


      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Setting
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text"></span>
            Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
