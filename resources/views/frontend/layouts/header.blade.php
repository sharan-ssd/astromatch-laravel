<header class="main-header w-100 z-10 bg-white">
    <nav class="navbar navbar-expand-xl navbar-light sticky-header p-0">
        <div class="container d-flex align-items-center justify-content-lg-between position-relative">
            <a href="index.php" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">
                <img src="assets/img/logo-color.png" alt="logo" class="img-fluid logo-color" />
            </a>
            <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop" role="button">
                <i class="flaticon-menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop"
                    aria-controls="offcanvasWithBackdrop"></i>
            </a>
            <div class="clearfix"></div>
            <div class="collapse navbar-collapse justify-content-center p-3">
                <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                    <li class="nav-item -dropdown setup-process-item">
                        <a href="faq.php" target="_blank" class="btn btn-mat btn-sm mt-2"><img class="mr-2 px-2"
                                src="assets/img/Faq.svg" alt="FAQ" /> FAQ</a>
                        <a href="https://drive.google.com/file/d/1U8j6etOcRhlkR6oL1Ekdbjg9NB2lNsv4/view?usp=sharing"
                            target="_blank" class="btn btn-outline-mat btn-sm mt-2"
                            style="font-size:15px; padding:12px"><img src="assets/img/Group.svg" class="user-guide"
                                alt="User Guide" />User Guide</a>
                        <a href="#feedbackModal" data-bs-toggle="modal" class="btn btn-outline-mat btn-sm mt-2"><img
                                class="px-2" src="assets/img/Feedback.svg" alt="Feedback" />Send Feedback</a>
                        <!-- <a href="login.php" class="btn btn-mat btn-sm mt-2"><img class="mr-2 px-2" src="assets/img/login-icon.png" alt="Login" /> Already registered ? Please click here to Sign In</a> -->
                        <!-- <a href="login.php" class="btn btn-mat btn-sm mt-2"> Already registered ? Please click here to Sign In</a> -->


                    </li>
                </ul>
            </div>
            @if(Auth::check())
                <a href="{{ route('logout') }}" class="btn btn-mat d-md-block d-lg-block">Logout</a>
            @else
                <a href="{{ route('google.login') }}" class="btn btn-mat d-md-block d-lg-block">Sign In</a>
            @endif

            <div class="action-btns text-end me-5 p-1.5 me-lg-0 d-none d-md-block d-lg-block justify-content-end">
                <form name="languageForm" method="post">
                    @csrf
                    <div class="form-group">
                        <select class="form-select-lg language-selection multi-language-selectlist"
                                name="languageSelected" onchange="this.form.submit();">
                            @foreach($languages as $lang)
                                <option value="{{ $lang }}" 
                                    {{ session('languageSelected') == $lang ? 'selected' : '' }}>
                                    {{ $lang }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </form>
            </div>
        </div>
    </nav>
    <!--offcanvas menu start-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasWithBackdrop">
        <div class="offcanvas-header d-flex align-items-center mt-4">
            <a href="index.php" class="d-flex align-items-center mb-md-0 text-decoration-none">
                <img src="assets/img/logo-color.png" alt="logo" class="img-fluid ps-2" />
            </a>
            <button type="button" class="close-btn text-danger" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="flaticon-cancel"></i>
            </button>
        </div>
        <div class="offcanvas-body">
            <div class="action-btns mt-2 mob-action-btns">
                <a href="https://drive.google.com/file/d/1U8j6etOcRhlkR6oL1Ekdbjg9NB2lNsv4/view?usp=sharing"
                    class="btn btn-link text-decoration-none btn-outline-grey btn-sm mb-2 p-2"><img
                        src="assets/img/Group.svg" class="user-guide" alt="User Guide" />User Guide</a>
                <form name="languageForm" method="post" style="">
                     @csrf
                    <div class="form-group">
                        <select class="form-select-lg language-selection multi-language-selectlist"
                            name="languageSelected" action="#" onchange="javascript:this.form.submit();">
                           @foreach($languages as $lang)
                                <option value="{{ $lang }}" 
                                    {{ session('languageSelected') == $lang ? 'selected' : '' }}>
                                    {{ $lang }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </form>
            </div>
            <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                <li class="nav-item -dropdown mt-3">
                    <a href="#compatibility-check" onclick="showRegister();"
                        class="mt-2 mb-2 p-2 mobile-menus navigate-after-close"><i class="fa fa-user"></i> Register
                        Free</a>
                    <a href="#compatibility-check" onclick="showLogin();"
                        class="mt-0 mobile-menus navigate-after-close"><i class="fa fa-sign-in"></i> Sign In</a>
                </li>
            </ul>
        </div>
    </div>
</header>