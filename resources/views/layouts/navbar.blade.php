<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #00A19D">
    <div class="container-fluid mx-5">
      <a class="navbar-brand" href="/"><img src="/img/Dropshops-logo-nav.png" style="height: 50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @if (!Auth::check())
            <li class="nav-item">
              <a class="nav-link text-white" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/register">Register</a>
            </li>
            @endif
            @if (Auth::check() && Auth::user()->role == 'admin')
            <li class="nav-item dropdown">
              <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Admin
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/add-shop">Add Shop</a></li>
                <li><a class="dropdown-item" href="/add-product">Add Product</a></li>
                <li><a class="dropdown-item" href="/all-transaction">All Transaction</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
              </ul>
            </li>
            @elseif (Auth::check() && Auth::user()->role == 'user')
            <li class="nav-item">
              <a class="nav-link text-white" href="/cart"><i class="bi bi-cart4"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->username }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><a class="dropdown-item" href="/transaction-history">Purchase History</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
              </ul>
            </li>
          @endif
        </ul>
        <form class="d-flex" action="/search">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" >
          <button class="btn btn-outline-success btn-light" type="submit" style="margin-left: -10px"><i class="bi bi-search"></i></button>
        </form>
      </div>
    </div>
</nav>