<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row align-items-center" style="height: 5em">
            <div class="col mb-2">
                <div id="fh5co-logo">
                    <a href="{{ route('home') }}">
                        <h2><strong>Home.</strong></h2>
                    </a>
                </div>
            </div>
            <div class="col mb-2">
                <div id="fh5co-logo">
                    <a href="{{ route('browse', 1) }}">
                        <h2><strong>Shop.</strong></h2>
                    </a>
                </div>
            </div>
            <div class="col-md-2 col-xs-2">
                <ul>
                    <li class="has-dropdown" >
                        <button class="btn dropdown-toggle hidden" type="button" id="a"
                            data-bs-toggle="dropdown" aria-expanded="false">
                                
                        </button>
                        <label for="a"><div id="fh5co-logo"><h3><strong>Catégories.</strong></h3></div></label>
                        <ul class="dropdown">
                            @foreach(Categorie::all() as $categorie)
                            <li class="nav-item">
                                <a class="nav-link" href="/categories/{{ $categorie->id }}">
                                    {{ $categorie->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                   </li>
                </ul>
            </div>
            <div class="row col-md-5 mb-4 align-items-center">
                <div class="col">
                    <form 
                          class="d-flex align-items-center" 
                          method= "POST" 
                          action="{{ action('App\Http\Controllers\ArticlesController@search') }}"
                          enctype="multipart/form-data"
                    >
                        @csrf
                        <input type="search" name="inlineFormInput" id="inlineFormInput"
                               class="form-control mb-2 @error('inlineFormInput') is-invalid @enderror" 
                               placeholder="Search"
                        >   
                        <input type="file" id="image" name="image" hidden class="@error('image') is-invalid @enderror"/>
                        <label for="image" class="bi bi-camera-fill mx-5"></label>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>
                </div>
            </div>      
            <div class="mb-4">
                <ul>
                    <li class="has-dropdown">

                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @guest
                                @if (Route::has('login'))
                                    <a href="{{ route('login') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                        <strong>Login</strong>
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('users.show', Auth::user()->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd"
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <strong>Login</strong>
                                </a>
                            @endguest
                        </button>
                        <ul class="dropdown">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item ">
                                    <a id="navbarDropdown" class="nav-link" href="{{ route('users.index') }}"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->nom }}
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="/commandes">commandes</a>
                                </li>
                                <hr>
                                <li class="nav-item ">

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </li>


                            @endguest
                        </ul>
                    </li>
                    @guest
                        @if (Route::has('login'))
                            <li class="shopping-cart"><a href="{{ route('login') }}"
                                    class="cart"><span><small>{{ auth()->user()
    ? auth()->user()->panier->articles->count()
    : 0 }}</small><i
                                            class="icon-shopping-cart"></i></span>&nbsp; Panier</a>
                            </li>
                        @endif
                    @else
                        <li class="shopping-cart"><a href="{{ route('paniers.index') }}"
                                class="cart"><span><small>{{ auth()->user()
    ? auth()->user()->panier->articles->count()
    : 0 }}</small><i
                                        class="icon-shopping-cart"></i></span>&nbsp; Panier</a>
                        </li>
                    @endguest

                </ul>
            </div>

        </div>
        <hr>
    </div>
</nav>
<div class="d-flex justify-content-center">
@error('image')
    <div class="alert alert-warning text-center" role="alert" style="width: 600px;">
      {{ $message }}
    </div>
@enderror
@error('inlineFormInput')
    <div class="alert alert-warning text-center" role="alert" style="width: 600px;">
      Please write something!
    </div>
@enderror
</div>
