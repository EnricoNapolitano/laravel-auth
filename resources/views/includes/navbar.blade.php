<nav class="container navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Portfolio</a>
    
    <div class="collapse navbar-collapse" id="navbarScroll">
    @auth
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.projects.index') }}">Projects</a>
        </li>
      </ul>
    @endauth
    @guest
      <a class="nav-link" href="{{ route('admin.home') }}">Login</a>
    @endguest
    </div>
  </div>
</nav>