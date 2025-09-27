<header class="main-header w-100 bg-white shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo-color.png') }}" alt="Logo" class="img-fluid" style="height:40px;">
            </a>

            <!-- Mobile Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="mainNavbar">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @auth
                        <a class="btn btn-outline-mat btn-sm mt-2" style="font-size:15px; padding:12px"
                            href="dashboard"><i class="fa fa-laptop px-2"></i>{{__('messages.godashboard')}}</a>
                        @else
                        <a class="nav-link btn btn-mat btn-sm mt-2 text-white" href="{{ url('faq') }}" target="_blank">
                            <img src="{{ asset('assets/img/Faq.svg') }}" class="me-2" alt="FAQ"> FAQ
                        </a>
                        @endauth
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-outline-mat btn-sm mt-2" style="font-size:15px; padding:12px" href="/"><i
                                class="fa fa-home px-2"></i>Back to Home</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="https://drive.google.com/file/d/1U8j6etOcRhlkR6oL1Ekdbjg9NB2lNsv4/view?usp=sharing"
                            target="_blank" class="btn btn-outline-mat btn-sm mt-2"
                            style="font-size:15px; padding:12px"><img class="px-2" src="{{asset('assets/img/Group.svg')}}"
                                class="user-guide" alt="User Guide" />{{__('messages.userguide')}}</a>
                    </li>
                </ul>

                {{-- <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                    <li class="nav-item -dropdown setup-process-item">
                        <a class="btn btn-outline-mat btn-sm mt-2" style="font-size:15px; padding:12px"
                            href="dashboard"><i class="fa fa-laptop px-2"></i>Go to Dashboard</a>
                        <a class="btn btn-outline-mat btn-sm mt-2" style="font-size:15px; padding:12px" href="/"><i
                                class="fa fa-home px-2"></i>Back to Home</a>
                        <a href="https://drive.google.com/file/d/1U8j6etOcRhlkR6oL1Ekdbjg9NB2lNsv4/view?usp=sharing"
                            target="_blank" class="btn btn-outline-mat btn-sm mt-2"
                            style="font-size:15px; padding:12px"><img class="px-2" src="assets/img/Group.svg"
                                class="user-guide" alt="User Guide" />User Guide</a>

                    </li>
                </ul> --}}

                <!-- Right Side -->
                <div class="d-flex align-items-center">


                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="langDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ strtoupper(config('app.locale_mapper_reverse')[app()->getLocale()]) }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                            @foreach(config('app.available_locales') as $locale)
                            <li>
                                <a class="dropdown-item" href="{{ url('locale/'.$locale) }}">
                                    {{ strtoupper($locale) }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Auth Buttons / Dropdown -->
                    @auth
                    <div class="dropdown">
                        <div class="dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="header-profile" height="50" width="50" style="border-radius:50%;"
                                src="{{Auth::user()->profilePicture}}" alt="Profile">
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/edit-profile') }}">Edit Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/horoscopelist') }}">Saved Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a href="{{ route('google.login') }}" class="btn btn-mat btn-sm">Sign In</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>
{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo-color.png') }}" alt="Logo" class="img-fluid" style="height:40px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="header-profile" height="50" width="60" src="assets/img/profile.png" alt="Profile">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav> --}}