<div>
    <nav class="social">
        @if ($about)
            <ul>
                <li><a href="{{ $about->twitter }}">Twitter <i class="fa fa-twitter"></i></a></li>
                <li><a href="{{ $about->facebook }}">Facebook <i class="fa fa-facebook"></i></a></li>
                <li><a href="{{ $about->instagram }}">instagram <i class="fa fa-instagram red"></i></a></li>
                <li><a href="{{ $about->youtube }}">youtube <i class="fa fa-youtube red"></i></a></li>
            </ul>
        @endif
    </nav>
    <!-- mobile site__header -->
    <header class="site__header d-lg-none">
        <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
        <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
            <div class="mobile-header__panel">
                <div class="container">
                    <div class="mobile-header__body">
                        <button class="mobile-header__menu-button">
                            <i class="fa fa-bars fa-2x"></i>
                        </button>
                        <a class="mobile-header__logo" href="{{ route('home') }}">
                            <!-- mobile-logo -->
                            <img src="{{ asset('user_assets/images/idesign/logo.jpg') }}" alt="logo">
                            <!-- mobile-logo / end -->
                        </a>
                        <div class="search search--location--mobile-header mobile-header__search">
                            <div class="search__body">
                                <form class="search__form" action="#">
                                    <input class="search__input" name="search"
                                        placeholder="Search over 10,000 products" aria-label="Site search" type="text"
                                        autocomplete="off" />
                                    <button class="search__button search__button--type--submit" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <button class="search__button search__button--type--close" type="button">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    <div class="search__border"></div>
                                </form>
                                <div class="search__suggestions suggestions suggestions--location--mobile-header"></div>
                            </div>
                        </div>
                        <div class="mobile-header__indicators">
                            <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                                <button class="indicator__button">
                                    <span class="indicator__area">
                                        <i class="fa fa-search fa-2x"></i>
                                    </span>
                                </button>
                            </div>
                            <div class="indicator indicator--mobile d-sm-flex d-none">
                                <a href="" class="indicator__button"><span class="indicator__area">
                                        <i class="fa fa-heart"></i>
                                        <span class="indicator__value">0</span></span></a>
                            </div>
                            <div class="indicator indicator--mobile">
                                <a href="" class="indicator__button"><span class="indicator__area">
                                        <i class="fa fa-shopping-cart fa-2x"></i>
                                        <span class="indicator__value">3</span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- mobile site__header / end -->
    <!-- desktop site__header -->
    <header class="site__header d-lg-block d-none">
        <div class="site-header">
            <!-- .topbar -->
            <div class="site-header__topbar topbar">
                <div class="topbar__container container">
                    <div class="topbar__row">


                        <!-- <div class="topbar__item topbar__item--link">
                    <a class="topbar-link" href="blog-classic.html">Blog</a>
                  </div> -->
                        <div class="topbar__spring"></div>
                        <div class="topbar__item">
                            <div class="topbar-dropdown">
                                @if ($about)
                                    <div class="customerservice">
                                        <p>Customer service: {{ $about->customers_service_number }}</p>
                                    </div>
                                    <div class="opening-hours">
                                        <p>Opens: {{ $about->opening_day }} {{ $about->opening_hour }}</p>
                                    </div>
                                @endif


                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- .topbar / end -->

            <div class="site-header__nav-panel">
                <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
                <div class="nav-panel nav-panel--sticky">
                    <div class="site-header__middle ">
                        <div class="site-header__logo">
                            <a href="index.html"><img src="{{ asset('user_assets/images/idesign/logo.jpg') }}"
                                    alt="logo"></a>
                        </div>
                        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

                        <div class="wrapper" style="width: 100%;">

                            <div class="searchBar">
                                <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search"
                                    wire:model="searchTerm" />
                                <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="#666666"
                                            d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="site-header__phone">
                            <!-- <div class="site-header__phone-title">Customer Service</div>
                  <div class="site-header__phone-number">+977 9876765432</div> -->
                            <div class="nav-panel__indicators">

                                @livewire('cart-count-component')
                                <div class="flex-class">
                                    @if (!Auth::user())
                                        <a href="{{ route('login') }}"
                                            class="indicator__button indicator indicator--trigger--click"><span
                                                class="indicator__area">
                                                <img src="{{ asset('user_assets/images/user.svg') }}">
                                                <p class="logintext">Login</p>
                                            </span>
                                        </a>
                                    @else
                                        <div class="topbar__item">
                                            <div class="topbar-dropdown">
                                                <button class="topbar-dropdown__btn" type="button">
                                                    {{ Auth::user()->name }}
                                                    {{ Auth::user()->utype === 'ADM' ? '(Admin)' : '' }}
                                                    <svg width="7px" height="5px">
                                                        <use
                                                            xlink:href="{{ asset('user_assets/images/sprite.svg') }}#arrow-rounded-down-7x5">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="topbar-dropdown__body">
                                                    <!-- .menu -->
                                                    <div class="menu menu--layout--topbar">
                                                        <div class="menu__submenus-container"></div>
                                                        @if (Auth::user()->utype === 'USR')
                                                            <ul class="menu__list">
                                                                <li class="menu__item">
                                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                                    <div class="menu__item-submenu-offset"></div>
                                                                    <a class="menu__item-link"
                                                                        href="{{ route('user.dashboard') }}">Dashboard</a>
                                                                </li>
                                                                <li class="menu__item">
                                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                                    <div class="menu__item-submenu-offset"></div>
                                                                    <a class="menu__item-link"
                                                                        href="{{ route('user.profile') }}">Edit
                                                                        Profile</a>
                                                                </li>
                                                                <li class="menu__item">
                                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                                    <div class="menu__item-submenu-offset"></div>
                                                                    <a class="menu__item-link"
                                                                        href="{{ route('user.order') }}">Order
                                                                        History</a>
                                                                </li>
                                                                <li class="menu__item">
                                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                                    <div class="menu__item-submenu-offset"></div>
                                                                    <a class="menu__item-link"
                                                                        href="{{ route('user.password') }}">Password</a>
                                                                </li>
                                                                <li class="menu__item">
                                                                    <form id="logout-form"
                                                                        action="{{ route('logout') }}" method="POST"
                                                                        class="d-none">
                                                                        @csrf
                                                                    </form>
                                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                                    <div class="menu__item-submenu-offset"></div>
                                                                    <a class="menu__item-link"
                                                                        href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">Logout</a>
                                                                </li>
                                                            </ul>
                                                        @else
                                                            <ul class="menu__list">
                                                                <li class="menu__item">
                                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                                    <div class="menu__item-submenu-offset"></div>
                                                                    <a class="menu__item-link"
                                                                        href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                                </li>
                                                                <li class="menu__item">
                                                                    <form id="logout-form"
                                                                        action="{{ route('logout') }}" method="POST"
                                                                        class="d-none">
                                                                        @csrf
                                                                    </form>
                                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                                    <div class="menu__item-submenu-offset"></div>
                                                                    <a class="menu__item-link"
                                                                        href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">Logout</a>
                                                                </li>
                                                            </ul>
                                                        @endif
                                                    </div>
                                                    <!-- .menu / end -->
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-panel__container">
                        <div class="nav-panel__row">
                            <div class="nav-panel__departments">
                                <!-- .departments -->
                                <div class="departments" data-departments-fixed-by=".block-slideshow">
                                    <div class="departments__body">
                                        <div class="departments__links-wrapper">
                                            <div class="departments__submenus-container"></div>
                                            @if ($categories->count() > 0)
                                                <ul class="departments__links">
                                                    @foreach ($categories as $key => $category)
                                                        <!-- first list start -->
                                                        <li id="cat" class="departments__item">
                                                            <a class="departments__item-link" href="#">
                                                                {{ $category->name }}
                                                                <i class="fa fa-angle-right"></i>
                                                            </a>
                                                            <div
                                                                class="departments__submenu departments__submenu--type--menu">
                                                                <!-- .menu -->
                                                                <div class="menu menu--layout--classic">
                                                                    <div class="menu__submenus-container"></div>
                                                                    @if ($category->subCategories->count() > 0)
                                                                        <ul class="menu__list">
                                                                            @foreach ($category->subCategories as $key => $sub_category)
                                                                                <li class="menu__item">
                                                                                    <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                                                    <div
                                                                                        class="menu__item-submenu-offset">
                                                                                    </div>
                                                                                    <a class="menu__item-link"
                                                                                        href="#">
                                                                                        {{ $sub_category->name }}
                                                                                        <i
                                                                                            class="fa fa-angle-right"></i>
                                                                                    </a>
                                                                                    <div class="menu__submenu">
                                                                                        <!-- .menu -->
                                                                                        <div
                                                                                            class="menu menu--layout--classic">
                                                                                            <div
                                                                                                class="menu__submenus-container">
                                                                                            </div>
                                                                                            @if ($sub_category->childCategories->count() > 0)
                                                                                                <ul
                                                                                                    class="menu__list">
                                                                                                    @foreach ($sub_category->childCategories as $child_category)
                                                                                                        <li
                                                                                                            class="menu__item">
                                                                                                            <div
                                                                                                                class="menu__item-submenu-offset">
                                                                                                            </div>
                                                                                                            <a class="menu__item-link"
                                                                                                                href="{{ route('category',['category_slug'=>$child_category->slug]) }}">
                                                                                                                {{ $child_category->name }}
                                                                                                            </a>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            @endif
                                                                                        </div>
                                                                                        <!-- .menu / end -->
                                                                                    </div>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </div>
                                                                <!-- .menu / end -->
                                                            </div>
                                                        </li>
                                                        <!-- first list end -->
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <button class="departments__button">
                                        <i style="margin-top: 4px;" class="fas fa-bars"></i>
                                        Shop By Category
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                </div>
                                <!-- .departments / end -->
                            </div>
                            <!-- .nav-links -->
                            <div class="nav-panel__nav-links nav-links">
                                <ul class="nav-links__list">
                                    <li class="nav-links__item nav-links__item--has-submenu">
                                        <a class="nav-links__item-link" href="{{ route('home') }}">
                                            <div class="nav-links__item-body">
                                                Home

                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-links__item nav-links__item--has-submenu">
                                        <a class="nav-links__item-link" href="{{ route('about') }}">
                                            <div class="nav-links__item-body">
                                                About
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-links__item nav-links__item--has-submenu">
                                        <a class="nav-links__item-link" href="{{ route('contact') }}">
                                            <div class="nav-links__item-body">
                                                Contact
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-links__item nav-links__item--has-submenu">
                                        <a class="nav-links__item-link" href="{{ route('contact') }}#map-location">
                                            <div class="nav-links__item-body">
                                                Location
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <!-- .nav-links / end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- desktop site__header / end -->
</div>
