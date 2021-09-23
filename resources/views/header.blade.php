<!-- Header -->
<header id="header" class="header">
    <div class="navigation">
        <div class="container">
            <nav class="nav navbar navbar-expand navbar-expand-sm navbar-expand-md navbar-expand-lg">
                <div class="nav__hamburger">
                    <svg>
                        <use xlink:href="{{ URL::to('images/sprite.svg#icon-menu') }}"></use>
                    </svg>
                </div>

                <div class="nav__logo">
                    <a href="/">HandArt</a>
                </div>

                <div class="nav__menu">
                    <div class="menu__top">
                        <span class="nav__category">HandArt</span>
                        <a href="#" class="close__toggle">
                            <svg>
                                <use xlink:href="{{ URL::to('images/sprite.svg#icon-cross') }}"></use>
                            </svg>
                        </a>
                    </div>
                    <ul class="nav__list col-md-3">
                        <li class="nav__item">
                            <a href="/" class="nav__link">Home</a>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav__link scroll-link" href="#" id="navbarDropdown" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Category</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach (Categorie::all() as $categorie)
                                    <li class="nav-item">
                                        <a class="nav-link text-dark" href="/categories/{{ $categorie->id }}">
                                            {{ $categorie->name }}
                                        </a>
                                    </li>
                                    <hr class="dropdown-divider">
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav__item">
                            <a href="#news" class="nav__link scroll-link">Blog</a>
                        </li>
                        <li class="nav__item">
                            <a href="#contact" class="nav__link scroll-link">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="nav__icons align-items-center">

                    <form class="d-flex align-items-center" method="POST"
                        action="{{ action('App\Http\Controllers\ArticlesController@search') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="search" name="inlineFormInput" id="inlineFormInput"
                            class="form-control @error('inlineFormInput') is-invalid @enderror" placeholder="Search">
                        <input type="file" id="image" name="image"
                            class="form-control @error('image') is-invalid @enderror" hidden>
                        <label for="image" style="font-size:20px" class="btn bi bi-camera my-auto"></label>
                        <button type="submit" class="icon__item mx-3">
                            <svg class="icon__search">
                                <use xlink:href="{{ URL::to('images/sprite.svg#icon-search') }}"></use>
                            </svg>
                        </button>
                    </form>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown mx-3">
                            <button class="icon__item nav-link" id="navbarDropdown" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <svg class="icon__user">
                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-user') }}"></use>
                                </svg>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @guest
                                    @if (Route::has('login'))
                                        <li class="dropdown-item">
                                            <a href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    @endif
                                    @if (Route::has('register'))
                                        <li class="dropdown-item">
                                            <a href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="dropdown-item">Hey {{ Auth::user()->nom }}!</li>
                                    <li class="dropdown-item">
                                        <a href="{{ route('users.show', Auth::user()->id) }}">Your Account</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="/commandes">Your Orders ({{ Auth::user()->commandes()->count() }})</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li class="nav-item ">

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                    </li>
                                @endguest
                            </ul>
                        </li>
                    </ul>


                    <div>
                        <a href="/paniers" class="icon__item">
                            <svg class="icon__cart">
                                <use xlink:href="{{ URL::to('images/sprite.svg#icon-shopping-basket') }}"></use>
                            </svg>
                            <span
                                id="cart__total">{{ Auth::user() ? Auth::user()->panier->nbre_articles : 0 }}</span>
                        </a>
                    </div>

                </div>
            </nav>
        </div>
    </div>


</header>
<!-- End Header -->
