<nav class="navbar navbar-expand-lg navbar-dark guest-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('guest.home') }}">📚 BookStore Guest</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#guestNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="guestNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('guest.home') ? 'active' : '' }}"
                       href="{{ route('guest.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('guest.publishers.*') ? 'active' : '' }}"
                       href="{{ route('guest.publishers.index') }}">Publishers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('guest.books.*') ? 'active' : '' }}"
                       href="{{ route('guest.books.index') }}">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('guest.categories.*') ? 'active' : '' }}"
                       href="{{ route('guest.categories.index') }}">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('guest.products.*') ? 'active' : '' }}"
                       href="{{ route('guest.products.index') }}">Products</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
