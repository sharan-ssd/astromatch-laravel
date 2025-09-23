@extends('frontend.template')

@section('content')
<!--preloader start-->
<div id="preloader" class="bg-light-subtle">
    <div class="preloader-wrap">
        <img src="assets/img/favicon.png" alt="logo" class="img-fluid preloader-icon">
        <div class="loading-bar"></div>
    </div>
</div>
<!--preloader end-->


<link rel="stylesheet" href="css/intlTelInput.css">

</div>
<div class="cosmic-bg"></div>
<div class="hearts-animation" id="heartsContainer"></div>
<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-content">
            <h2>Discover Your Perfect Cosmic Match Through Ancient Astrology</h2>
            <p>Get a detailed compatibility analysis that reveals the deepest connections between you and your partner
                using time-tested Vedic astrology.</p>
            <div class="trust-indicators">
                <div class="trust-item">
                    <span>⭐ 83% Accuracy Rate</span>
                </div>
                <div class="trust-item">
                    <span>💑 5,000+ Matches Made</span>
                </div>
                <div class="trust-item">
                    <span>🔒 100% Confidential</span>
                </div>
            </div>
        </div>

        @include('frontend.home.horoscope_form')

    </div>
</section>

<!-- Features -->
<section class="features">
    <div class="section-container">
        <h2 class="section-title">What Makes Our Compatibility Analysis Special</h2>

        <div class="features-grid">
            <div class="feature">
                <div class="feature-icon">🎯</div>
                <h3>36 Compatibility Points</h3>
                <p>Our advanced algorithm analyzes 36 different compatibility factors including emotional, physical,
                    mental, and spiritual dimensions.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">🔮</div>
                <h3>Ancient Vedic Wisdom</h3>
                <p>Based on 5000-year-old Vedic astrology principles combined with modern relationship psychology for
                    unmatched accuracy.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">📊</div>
                <h3>Detailed Score Breakdown</h3>
                <p>Get individual scores for communication, romance, trust, values, and long-term potential with
                    actionable insights.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">💡</div>
                <h3>Personalized Remedies</h3>
                <p>Receive custom recommendations and remedies to strengthen weak areas and enhance your relationship's
                    potential.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">📅</div>
                <h3>Future Predictions</h3>
                <p>Know the best times for important decisions like engagement, marriage, or starting a family based on
                    planetary positions.</p>
            </div>

            <div class="feature">
                <div class="feature-icon">🛡️</div>
                <h3>100% Confidential</h3>
                <p>Your personal information is encrypted and never shared. We respect your privacy and maintain
                    complete confidentiality.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="how-it-works">
    <div class="section-container">
        <h2 class="section-title">How Astro Match Works</h2>

        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Enter Birth Details</h3>
                <p>Provide accurate birth information for both partners including date, time, and place.</p>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <h3>AI Analysis</h3>
                <p>Our advanced algorithm analyzes planetary positions and calculates compatibility scores.</p>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <h3>Get Your Report</h3>
                <p>Receive a comprehensive report with scores, insights, and personalized recommendations.</p>
            </div>

            <div class="step">
                <div class="step-number">4</div>
                <h3>Apply Insights</h3>
                <p>Use the guidance to strengthen your relationship and navigate challenges together.</p>
            </div>
        </div>
    </div>
</section>


<!-- Pricing Table Start -->
<section id="pricingDetail" class="pricing-table-1">
    <div class="pricing-table-title">
        <h2>Pricing Details</h2>
    </div>
    <div class="pricing-table table-1">
        <div class="ptable-item">
            <div class="ptable-single">
                <div class="ptable-header">
                    <div class="ptable-title">
                        <h2>Existing Couple Solution</h2>
                    </div>
                    <div class="ptable-price">
                        <h2><small>₹</small>100 <span class="strikethrough">₹200</span><span> + GST</span></h2>
                        <span class="price-note"><i>per Report</i></span>
                    </div>
                </div>
                <div class="ptable-body">
                    <div class="ptable-description">
                        <ul class="feature-list">
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>10 Points Match
                            </li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>36 Points Match
                            </li>
                            <li><i class="fa fa-check feature-point"></i>9 Planets based Most Accurate Match<a href="#"
                                    onclick="showTooltip(3, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Astrological Remedies<a href="#"
                                    onclick="showTooltip(4, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Astro-Music Healing Therapy<a href="#"
                                    onclick="showTooltip(5, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Psychological Remedies<a href="#"
                                    onclick="showTooltip(6, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>12 Houses based
                                Matching for Male</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>12 Houses based
                                Matching for Female</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Sevvaai Dosha Match
                            </li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Rahu-Kethu Dosha
                                Match</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Kala Sarpa Dosha
                                Match</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Kalathira Dosha
                                Match</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Star Thara Palan
                            </li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Mana Sanchala Dosha
                                Match</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Numerology Match
                            </li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Dasa Sandhi Period
                                Check</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Dasa Bhukti details
                                of Male Horoscope</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Dasa Bhukti details
                                of Female Horoscope</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Detailed
                                Astrological Analysis of Male Horoscope</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Detailed
                                Astrological Analysis of Female Horoscope</li>
                        </ul>
                    </div>
                </div>
                <div class="ptable-footer">
                    <div class="">
                        <a class="mt-2 mx-2" id="samplePremium" href="Existing Couple Match Making Report.pdf"
                            target="_blank"><i class="fa fa-download"></i> Click here to view/download the sample report
                            of Existing Couple</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="ptable-item featured-item">
            <div class="ptable-single">
                <div class="ptable-header">
                    <div class="ptable-title">
                        <h2>Premium Report</h2>
                    </div>
                    <div class="ptable-price">
                        <h2><small>₹</small>99 <span class="strikethrough">₹199</span><span> <span> + GST</span></h2>
                        <span class="price-note"><i>per Report</i></span>
                    </div>
                </div>
                <div class="ptable-body">
                    <div class="ptable-description">
                        <ul class="feature-list">
                            <!--<li><i class="fa fa-check feature-point"></i>10 Points Match<a href="#" onclick="showTooltip(1);">
                                        <i class="fa-solid fa-circle-info"></i></a>                                        
                                        <div class="modal fade" id="modalTooltip" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-body">
                                                <i><h5 class="modal-title" id="lblTooltip" style="font-weight: bold">The 10 Point Match in marriage matching (dasama compatibility) is a horoscope analysis of the characteristics, life goals, and family harmony of the two bride and grooms, and helps predict the successful married life of the couple through <br/>10 compatibility calculations based on the birth star.<br/>This is mostly practiced in South India.</h5></i>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </li>-->

                            <li>
                                <i class="fa fa-check feature-point"></i>
                                10 Points Match <a href="#" onclick="showTooltip(1, event);">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>

                                <!-- Custom Tooltip (not Bootstrap modal) -->
                                <div id="modalTooltip" class="tooltip-box">
                                    <span id="lblTooltip"></span>
                                    <a href="" id="lnkmeaning" target="_blank">read more</a>
                                </div>
                            </li>

                            <li><i class="fa fa-check feature-point"></i>36 Points Match<a href="#"
                                    onclick="showTooltip(2, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>9 Planets based Most Accurate Match<a href="#"
                                    onclick="showTooltip(3, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Astrological
                                Remedies</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Astro-Music Healing
                                Therapy</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Psychological
                                Remedies</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>12 Houses based
                                Matching for Male</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>12 Houses based
                                Matching for Female</li>
                            <li><i class="fa fa-check feature-point"></i>Sevvaai Dosha Match<a href="#"
                                    onclick="showTooltip(9, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Rahu-Kethu Dosha Match<a href="#"
                                    onclick="showTooltip(10, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Kala Sarpa Dosha
                                Match</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Kalathira Dosha
                                Match</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Star Thara Palan
                            </li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Mana Sanchala Dosha
                                Match</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Numerology Match
                            </li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Dasa Sandhi Period
                                Check</li>
                            <li><i class="fa fa-check feature-point"></i>Dasa Bhukti details of Male Horoscope<a
                                    href="#" onclick="showTooltip(17, event); return false;"><i
                                        class="fa-solid fa-circle-info" style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Dasa Bhukti details of Female Horoscope<a
                                    href="#" onclick="showTooltip(18, event); return false;"><i
                                        class="fa-solid fa-circle-info" style="padding-left : 8px"></i></a></li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Detailed
                                Astrological Analysis of Male Horoscope</li>
                            <li class="disabled-feature"><i class="fa fa-times feature-point-no"></i>Detailed
                                Astrological Analysis of Female Horoscope</li>
                        </ul>
                    </div>
                </div>
                <div class="ptable-footer">
                    <div class="">
                        <a class="mt-2 mx-2" id="sampleComplete" href="New Alliance Match Making Report.pdf"
                            target="_blank"><i class="fa fa-download"></i> Click here to view / download the primium
                            sample report</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="ptable-item featured-item">
            <div class="ptable-single">
                <div class="ptable-header">
                    <div class="ptable-title">
                        <h2>New Alliance Match</h2>
                    </div>
                    <div class="ptable-price">
                        <h2><small>₹</small>199 <span class="strikethrough">₹399</span><span> <span> + GST</span></h2>
                        <span class="price-note"><i>per Report</i></span>
                    </div>
                </div>
                <div class="ptable-body">
                    <div class="ptable-description">
                        <ul class="feature-list">
                            <!--<li><i class="fa fa-check feature-point"></i>10 Points Match<a href="#" onclick="showTooltip(1);">
                                        <i class="fa-solid fa-circle-info"></i></a>                                        
                                        <div class="modal fade" id="modalTooltip" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <div class="modal-body">
                                                <i><h5 class="modal-title" id="lblTooltip" style="font-weight: bold">The 10 Point Match in marriage matching (dasama compatibility) is a horoscope analysis of the characteristics, life goals, and family harmony of the two bride and grooms, and helps predict the successful married life of the couple through <br/>10 compatibility calculations based on the birth star.<br/>This is mostly practiced in South India.</h5></i>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </li>-->

                            <li>
                                <i class="fa fa-check feature-point"></i>
                                10 Points Match <a href="#" onclick="showTooltip(1, event);">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>

                                <!-- Custom Tooltip (not Bootstrap modal) -->
                                <div id="modalTooltip" class="tooltip-box">
                                    <span id="lblTooltip"></span>
                                    <a href="" id="lnkmeaning" target="_blank">read more</a>
                                </div>
                            </li>

                            <li><i class="fa fa-check feature-point"></i>36 Points Match<a href="#"
                                    onclick="showTooltip(2, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>9 Planets based Most Accurate Match<a href="#"
                                    onclick="showTooltip(3, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Astrological Remedies<a href="#"
                                    onclick="showTooltip(4, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Astro-Music Healing Therapy<a href="#"
                                    onclick="showTooltip(5, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Psychological Remedies<a href="#"
                                    onclick="showTooltip(6, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>12 Houses based Matching for Male<a href="#"
                                    onclick="showTooltip(7, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>12 Houses based Matching for Female<a href="#"
                                    onclick="showTooltip(8, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Sevvaai Dosha Match<a href="#"
                                    onclick="showTooltip(9, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Rahu-Kethu Dosha Match<a href="#"
                                    onclick="showTooltip(10, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Kala Sarpa Dosha Match<a href="#"
                                    onclick="showTooltip(11, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Kalathira Dosha Match<a href="#"
                                    onclick="showTooltip(12, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Star Thara Palan<a href="#"
                                    onclick="showTooltip(13, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Mana Sanchala Dosha Match<a href="#"
                                    onclick="showTooltip(14, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Numerology Match<a href="#"
                                    onclick="showTooltip(15, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Dasa Sandhi Period Check<a href="#"
                                    onclick="showTooltip(16, event); return false;"><i class="fa-solid fa-circle-info"
                                        style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Dasa Bhukti details of Male Horoscope<a
                                    href="#" onclick="showTooltip(17, event); return false;"><i
                                        class="fa-solid fa-circle-info" style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Dasa Bhukti details of Female Horoscope<a
                                    href="#" onclick="showTooltip(18, event); return false;"><i
                                        class="fa-solid fa-circle-info" style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Detailed Astrological Analysis of Male
                                Horoscope<a href="#" onclick="showTooltip(19, event); return false;"><i
                                        class="fa-solid fa-circle-info" style="padding-left : 8px"></i></a></li>
                            <li><i class="fa fa-check feature-point"></i>Detailed Astrological Analysis of Female
                                Horoscope<a href="#" onclick="showTooltip(20, event); return false;"><i
                                        class="fa-solid fa-circle-info" style="padding-left : 8px"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="ptable-footer">
                    <div class="">
                        <a class="mt-2 mx-2" id="sampleComplete" href="New Alliance Match Making Report.pdf"
                            target="_blank"><i class="fa fa-download"></i> Click here to view/download the sample report
                            of New Alliance Match</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pricing Table End -->

<!--Horoscope Matching end-->

<div id="compatibility-check" class="container" style="display: none;">
    <div class="col-md-12">
        <div id="signupDiv" class="form-zodiuc mb-5 mt-5 mt-lg-0">
            <form id="signupForm" class="reg-form" name="signupForm" action="#" method="post">
                <div class="signup-form">
                    <div class="signup-form-two">
                        <div class="access_social">
                            <a href="https://accounts.google.com/o/oauth2/v2/auth?response_type=code&access_type=online&client_id=433035171636-mjs1qgep3i5mgf94u6tnrbvj0m9f36dp.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fastromatch.online%2Fgoogle-login.php&state&scope=email%20profile&prompt=select_account"
                                title="Continue with Google" class="social_bt google mb-3"><img
                                    src="assets/img/google.png" title="Google Login" class="google-img">Register with
                                Google</a>
                            <a href="javascript:void(0);" title="Continue with Facebook"
                                class="social_bt facebook mb-3 d-none">Continue with Facebook</a>
                        </div>
                        <span class="or-button">Or, register with email</span>
                        <div class="col-md-12">
                            <div class="col-lg-12 mb-3">
                                <span class="error-message"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label>* Full Name </label><br />
                                        <span id="nameError" class="error-message"></span>
                                        <input type="text" class="form-control" id="fullname" name="fullname"
                                            maxlength="15" placeholder="Full Name" pattern="[A-Za-z\s]+"
                                            title="Only letters and spaces are allowed."
                                            onchange="validateFullName();" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label>* Email </label><br />
                                        <span id="emailError" class="error-message"></span>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email" value="" autocomplete="off"
                                            onchange="checkDuplicateEmail();" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label>* Mobile Number </label><br />
                                        <span id="mobileError" class="error-message"></span>
                                        <input type="tel" class="form-control" onkeyup="isNumberCheck(event)"
                                            id="mobile" name="mobile" placeholder="Mobile Number" maxlength="15"
                                            pattern="[0-9]+">
                                    </div>
                                    <div id="sendotp" class="col-lg-12">
                                        <button type="button" id="" class="bg-orange" onclick="checkDuplicateMobile();">
                                            send OTP
                                        </button>
                                    </div>
                                    <div id="verifyotp" class="col-lg-12" style="display:none;">
                                        <label for="otp" class="mb-1">
                                            <span class="text-danger">*</span> Please enter the OTP sent to your
                                            registered mobile number </label><br />
                                        <span id="otpError" class="text-danger"></span>
                                        <div class="form-control-group mb-3">
                                            <input type="number" required onchange="verifyMobile()"
                                                class="form-control otpctrl" id="otp" name="otp" placeholder="Enter OTP"
                                                min="1000" max="9999" />
                                        </div>
                                        <input type="hidden" id="valid_otp" required name="otp_verified" />
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="button" id="btnVerifyOTP" class="bg-orange"
                                                    onclick="verifyMobile()">
                                                    Verify OTP </button>
                                            </div>
                                            <div class="col-md-6">
                                                <button onclick="showMobile();" type="button" id="btnEditMobile"
                                                    class="my-2 btn btn-sm btn-secondary">
                                                    Edit Mobile
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label>* Password </label><br />
                                        <span id="passwordError" class="error-message"></span>
                                        <input type="password" class="form-control" id="password" autocomplete="off"
                                            name="password" placeholder="Password" maxlength="8" />
                                        <a class="view-change-password login-view-pwd-icon" href="javascript:void(0);"
                                            onclick="viewPassword()">
                                            <i class="fa fa-eye open_eye_current"></i>
                                            <i class="fa fa-eye-slash close_eye_current" style="display: none"></i>
                                        </a>
                                        <small>( <span>The password must be within 8 characters.</span> )</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label>* Gender </label><br />
                                        <span id="genderError" class="error-message"></span>
                                        <div class="radio-group common-radio-btns">
                                            <div class="radio-item">
                                                <label><input type="radio" class="form-check form-check-inline"
                                                        name="usergender" value="Male" />Male</label>
                                            </div>
                                            <div class="radio-item">
                                                <label><input type="radio" class="form-check form-check-inline"
                                                        name="usergender" value="Female" />Female</label>
                                            </div>
                                            <div class="radio-item">
                                                <label><input type="radio" class="form-check form-check-inline"
                                                        name="usergender" value="Transgender" />Transgender</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label>* User Type </label><br />
                                        <span id="userlevelError" class="error-message"></span>
                                        <div class="radio-group common-radio-btns">
                                            <div class="radio-item">
                                                <label><input type="radio" class="form-check form-check-inline"
                                                        id="rbUser" name="userlevel" value="User" />General User</label>
                                            </div>
                                            <div class="radio-item">
                                                <label><input type="radio" class="form-check form-check-inline"
                                                        id="rbAstrologer" name="userlevel"
                                                        value="Astrologer" />Astrologer</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" onclick="showLogin();"> <u><b>Already registered ? Please
                                            click here to Sign In ? </b></u></a>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div id="submitbutton" class="col-lg-12 registration-btn">
                                    <button name="btnSubmit" id="btnSignup" class="btn btn-mat register-btn-new1"
                                        onclick="validateSignUp();">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div id="loginDiv" class="form-zodiuc mb-5 mt-5 mt-lg-0" style="">
            <form id="loginForm" name="loginForm" class="login-form" action="#" method="post">
                <div class="signup-form">
                    <div class="signup-form-two">
                        <div class="access_social">
                            <a href="https://accounts.google.com/o/oauth2/v2/auth?response_type=code&access_type=online&client_id=433035171636-mjs1qgep3i5mgf94u6tnrbvj0m9f36dp.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fastromatch.online%2Fgoogle-login.php&state&scope=email%20profile&prompt=select_account"
                                title="Continue with Google" class="social_bt google mb-3"><img
                                    src="assets/img/google.png" title="Google Login" class="google-img">Login with
                                Google</a>
                            <a href="javascript:void(0);" title="Continue with Facebook"
                                class="social_bt facebook mb-3 d-none">Continue with Facebook</a>
                        </div>
                        <span class="or-button">Or, Login with email</span>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>* Email</label><br />
                                    <span id="loginEmailError" style="color: red;font-size: 11px;"></span>
                                    <input type="email" class="form-control" id="loginemail" name="loginemail"
                                        placeholder="Email" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>* Password</label><br />
                                    <span id="loginPasswordError" style="color: red;font-size: 11px;"></span>
                                    <input type="password" id="loginpassword" name="loginpassword" class="form-control"
                                        placeholder="Password" />
                                    <a class="view-change-password login-view-pwd-icon" href="javascript:void(0);"
                                        onclick="viewLoginPassword()">
                                        <i class="fa fa-eye open_eye_current"></i>
                                        <i class="fa fa-eye-slash close_eye_current" style="display: none"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" onclick="showSingnup();"> <u><b>Click here to Sign Up
                                        </b></u></a> <br><br> <a href="forgot-password.php"> <u><b>Forgot Password ?
                                        </b></u></a>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div style="flex-wrap: wrap;justify-content: space-between;">
                                    <input type="button" name="submit" class="btn btn-sm btn-mat mt-2 signin-btn"
                                        onclick="validateEmailAndPassword();" value="Sign In" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div id="socialLoginDiv" class="form-zodiuc mb-5 mt-5 mt-lg-0" style="">
            <div class="signup-form">
                <div class="signup-form-two">
                    <div class="access_social">
                        <a href="https://accounts.google.com/o/oauth2/v2/auth?response_type=code&access_type=online&client_id=433035171636-mjs1qgep3i5mgf94u6tnrbvj0m9f36dp.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fastromatch.online%2Fgoogle-login.php&state&scope=email%20profile&prompt=select_account"
                            title="Continue with Google" class="social_bt google mb-3"><img src="assets/img/google.png"
                                title="Google Login" class="google-img">Login with Google</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="horoscopeDiv" class="row justify-content-center" style="display: none;">
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active gender-cards" id="monthly-package">
                        <form id="profiles" action="newhoroscope" method="post"
                            onsubmit="return checkProfile(event);">
                            <input type="hidden" id="profiles_form" name="profiles_form" value="1" />
                            <div class="col-md-12">
                                <div class="row my-4 justify-content-evenly">

                                    <div class="col-md-6" id="male-card">
                                        <div class="male-border-color">
                                            <img src="assets/img/Male.svg" alt="Male" /> Male Horoscope
                                        </div>
                                        <div
                                            class="package-card male-card rounded-41 padding-4 padding-xsm-6 padding-xl-8 d-flex flex-column flex-xl-row align-items-start gap-6">
                                            <div class="row mt-0">
                                                <div class="col-sm-12">
                                                    <label for="fullname1" class="mb-1">
                                                        <span class="text-danger">*</span> Full Name </label><br>
                                                    <span class="text-danger" id="maleName"> </span>
                                                    <div class="form-control-group mb-3">
                                                        <input type="text" class="form-control" id="fullname1"
                                                            name="fullname1" placeholder="Full Name" autocomplete="off"
                                                            aria-label="First name" onchange="validateMaleName();">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 ">
                                                    <div class="row">
                                                        <label for="male-year1" class="mb-1"><span
                                                                class="text-danger">*</span> Date of Birth</label><br>
                                                        <span class="text-danger" id="maleDOB"> </span>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select"
                                                                    name="male-year" id="male-year1"
                                                                    onchange="updateDays('male')">
                                                                    <option value="" selected="" disabled="">-YYYY-
                                                                    </option>
                                                                    <option value="2025">2025</option>
                                                                    <option value="2024">2024</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2000">2000</option>
                                                                    <option value="1999">1999</option>
                                                                    <option value="1998">1998</option>
                                                                    <option value="1997">1997</option>
                                                                    <option value="1996">1996</option>
                                                                    <option value="1995">1995</option>
                                                                    <option value="1994">1994</option>
                                                                    <option value="1993">1993</option>
                                                                    <option value="1992">1992</option>
                                                                    <option value="1991">1991</option>
                                                                    <option value="1990">1990</option>
                                                                    <option value="1989">1989</option>
                                                                    <option value="1988">1988</option>
                                                                    <option value="1987">1987</option>
                                                                    <option value="1986">1986</option>
                                                                    <option value="1985">1985</option>
                                                                    <option value="1984">1984</option>
                                                                    <option value="1983">1983</option>
                                                                    <option value="1982">1982</option>
                                                                    <option value="1981">1981</option>
                                                                    <option value="1980">1980</option>
                                                                    <option value="1979">1979</option>
                                                                    <option value="1978">1978</option>
                                                                    <option value="1977">1977</option>
                                                                    <option value="1976">1976</option>
                                                                    <option value="1975">1975</option>
                                                                    <option value="1974">1974</option>
                                                                    <option value="1973">1973</option>
                                                                    <option value="1972">1972</option>
                                                                    <option value="1971">1971</option>
                                                                    <option value="1970">1970</option>
                                                                    <option value="1969">1969</option>
                                                                    <option value="1968">1968</option>
                                                                    <option value="1967">1967</option>
                                                                    <option value="1966">1966</option>
                                                                    <option value="1965">1965</option>
                                                                    <option value="1964">1964</option>
                                                                    <option value="1963">1963</option>
                                                                    <option value="1962">1962</option>
                                                                    <option value="1961">1961</option>
                                                                    <option value="1960">1960</option>
                                                                    <option value="1959">1959</option>
                                                                    <option value="1958">1958</option>
                                                                    <option value="1957">1957</option>
                                                                    <option value="1956">1956</option>
                                                                    <option value="1955">1955</option>
                                                                    <option value="1954">1954</option>
                                                                    <option value="1953">1953</option>
                                                                    <option value="1952">1952</option>
                                                                    <option value="1951">1951</option>
                                                                    <option value="1950">1950</option>
                                                                    <option value="1949">1949</option>
                                                                    <option value="1948">1948</option>
                                                                    <option value="1947">1947</option>
                                                                    <option value="1946">1946</option>
                                                                    <option value="1945">1945</option>
                                                                    <option value="1944">1944</option>
                                                                    <option value="1943">1943</option>
                                                                    <option value="1942">1942</option>
                                                                    <option value="1941">1941</option>
                                                                    <option value="1940">1940</option>
                                                                    <option value="1939">1939</option>
                                                                    <option value="1938">1938</option>
                                                                    <option value="1937">1937</option>
                                                                    <option value="1936">1936</option>
                                                                    <option value="1935">1935</option>
                                                                    <option value="1934">1934</option>
                                                                    <option value="1933">1933</option>
                                                                    <option value="1932">1932</option>
                                                                    <option value="1931">1931</option>
                                                                    <option value="1930">1930</option>
                                                                    <option value="1929">1929</option>
                                                                    <option value="1928">1928</option>
                                                                    <option value="1927">1927</option>
                                                                    <option value="1926">1926</option>
                                                                    <option value="1925">1925</option>
                                                                    <option value="1924">1924</option>
                                                                    <option value="1923">1923</option>
                                                                    <option value="1922">1922</option>
                                                                    <option value="1921">1921</option>
                                                                    <option value="1920">1920</option>
                                                                    <option value="1919">1919</option>
                                                                    <option value="1918">1918</option>
                                                                    <option value="1917">1917</option>
                                                                    <option value="1916">1916</option>
                                                                    <option value="1915">1915</option>
                                                                    <option value="1914">1914</option>
                                                                    <option value="1913">1913</option>
                                                                    <option value="1912">1912</option>
                                                                    <option value="1911">1911</option>
                                                                    <option value="1910">1910</option>
                                                                    <option value="1909">1909</option>
                                                                    <option value="1908">1908</option>
                                                                    <option value="1907">1907</option>
                                                                    <option value="1906">1906</option>
                                                                    <option value="1905">1905</option>
                                                                    <option value="1904">1904</option>
                                                                    <option value="1903">1903</option>
                                                                    <option value="1902">1902</option>
                                                                    <option value="1901">1901</option>
                                                                    <option value="1900">1900</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select"
                                                                    name="male-month" id="male-month1"
                                                                    onchange="updateDays('male')">
                                                                    <option value="" selected="" disabled="">-MM-
                                                                    </option>
                                                                    <option value="01">January</option>
                                                                    <option value="02">February</option>
                                                                    <option value="03">March</option>
                                                                    <option value="04">April</option>
                                                                    <option value="05">May</option>
                                                                    <option value="06">June</option>
                                                                    <option value="07">July</option>
                                                                    <option value="08">August</option>
                                                                    <option value="09">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select"
                                                                    name="male-date" id="male-date1">
                                                                    <option value="" selected="" disabled="">-DD-
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 ">
                                                    <div class="row">
                                                        <label for="male-hour" class="mb-1"><span
                                                                class="text-danger">*</span> Time of Birth</label><br>
                                                        <span class="text-danger" id="maleBirth"> </span>
                                                        <div class="col-sm-4">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select"
                                                                    name="male-hour" id="male-hour1">
                                                                    <option value="" selected="" disabled="">-HH-
                                                                    </option>
                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                    <option value="04">04</option>
                                                                    <option value="05">05</option>
                                                                    <option value="06">06</option>
                                                                    <option value="07">07</option>
                                                                    <option value="08">08</option>
                                                                    <option value="09">09</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select"
                                                                    name="male-minute" id="male-minute1">
                                                                    <option value="" selected="" disabled="">-MM-
                                                                    </option>
                                                                    <option value="00">00</option>
                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                    <option value="04">04</option>
                                                                    <option value="05">05</option>
                                                                    <option value="06">06</option>
                                                                    <option value="07">07</option>
                                                                    <option value="08">08</option>
                                                                    <option value="09">09</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                    <option value="32">32</option>
                                                                    <option value="33">33</option>
                                                                    <option value="34">34</option>
                                                                    <option value="35">35</option>
                                                                    <option value="36">36</option>
                                                                    <option value="37">37</option>
                                                                    <option value="38">38</option>
                                                                    <option value="39">39</option>
                                                                    <option value="40">40</option>
                                                                    <option value="41">41</option>
                                                                    <option value="42">42</option>
                                                                    <option value="43">43</option>
                                                                    <option value="44">44</option>
                                                                    <option value="45">45</option>
                                                                    <option value="46">46</option>
                                                                    <option value="47">47</option>
                                                                    <option value="48">48</option>
                                                                    <option value="49">49</option>
                                                                    <option value="50">50</option>
                                                                    <option value="51">51</option>
                                                                    <option value="52">52</option>
                                                                    <option value="53">53</option>
                                                                    <option value="54">54</option>
                                                                    <option value="55">55</option>
                                                                    <option value="56">56</option>
                                                                    <option value="57">57</option>
                                                                    <option value="58">58</option>
                                                                    <option value="59">59</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select" name="ampm1"
                                                                    id="ampm1-m">
                                                                    <option value=""></option>
                                                                    <option value="AM">AM</option>
                                                                    <option value="PM">PM</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="location1" class="mb-1"><span
                                                            class="text-danger">*</span> Place of Birth</label>
                                                    <p>(Please select city from the list, do not enter full address)</p>
                                                    <br />
                                                    <span class="text-danger" id="maleLoc"> </span>
                                                    <div class="form-control-group mb-3">
                                                        <!-- <input type="text"  value="hosur" data-location_input_prefix="male" class="form-control prokerala-location-input" name="location1" id="location1" placeholder="Place of Birth" autocomplete="off"/> -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="mobile1" class="mb-1"><span class="text-danger">*</span>
                                                        Mobile Number</label>
                                                    <br />
                                                    <span class="text-danger" id="mobile1error"> </span>
                                                    <div class="form-control-group mb-3">
                                                        <input type="tel" class="form-control" name="mobile1"
                                                            id="mobile1" placeholder="Mobile Number" autocomplete="off"
                                                            maxlength="15" onkeyup="isNumberCheck(event)" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="email1" class="mb-1"> Email</label>
                                                    <br />
                                                    <span class="text-danger" id="maleEmail"> </span>
                                                    <div class="form-control-group mb-3">
                                                        <input type="text" class="form-control" name="email1"
                                                            id="email1" placeholder="Email" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 " id="female-card">
                                        <div class="female-border-color">
                                            <img src="assets/img/Female.svg" alt="Female" /> Female Horoscope
                                        </div>
                                        <div
                                            class="package-card female-card rounded-41 padding-4 padding-xsm-6 padding-xl-8 d-flex flex-column flex-xl-row align-items-start gap-6">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label for="fullname2" class="mb-1">
                                                        <span class="text-danger">*</span> Full Name </label><br>
                                                    <span class="text-danger" id="femaleName"></span>
                                                    <div class="form-control-group mb-3">
                                                        <input type="text" class="form-control" id="fullname2"
                                                            name="fullname2" placeholder="Full Name" autocomplete="off"
                                                            aria-label="First name" onchange="validateFemaleName();">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 ">
                                                    <div class="row">
                                                        <label for="lastName" class="mb-1"><span
                                                                class="text-danger">*</span> Date of Birth</label>
                                                        <br>
                                                        <span class="text-danger" id="femaleDOB"> </span>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select"
                                                                    name="female-year1" id="female-year1"
                                                                    onchange="updateDays('female')">
                                                                    <option value="" selected="" disabled="">-YYYY-
                                                                    </option>
                                                                    <option value="2025">2025</option>
                                                                    <option value="2024">2024</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2000">2000</option>
                                                                    <option value="1999">1999</option>
                                                                    <option value="1998">1998</option>
                                                                    <option value="1997">1997</option>
                                                                    <option value="1996">1996</option>
                                                                    <option value="1995">1995</option>
                                                                    <option value="1994">1994</option>
                                                                    <option value="1993">1993</option>
                                                                    <option value="1992">1992</option>
                                                                    <option value="1991">1991</option>
                                                                    <option value="1990">1990</option>
                                                                    <option value="1989">1989</option>
                                                                    <option value="1988">1988</option>
                                                                    <option value="1987">1987</option>
                                                                    <option value="1986">1986</option>
                                                                    <option value="1985">1985</option>
                                                                    <option value="1984">1984</option>
                                                                    <option value="1983">1983</option>
                                                                    <option value="1982">1982</option>
                                                                    <option value="1981">1981</option>
                                                                    <option value="1980">1980</option>
                                                                    <option value="1979">1979</option>
                                                                    <option value="1978">1978</option>
                                                                    <option value="1977">1977</option>
                                                                    <option value="1976">1976</option>
                                                                    <option value="1975">1975</option>
                                                                    <option value="1974">1974</option>
                                                                    <option value="1973">1973</option>
                                                                    <option value="1972">1972</option>
                                                                    <option value="1971">1971</option>
                                                                    <option value="1970">1970</option>
                                                                    <option value="1969">1969</option>
                                                                    <option value="1968">1968</option>
                                                                    <option value="1967">1967</option>
                                                                    <option value="1966">1966</option>
                                                                    <option value="1965">1965</option>
                                                                    <option value="1964">1964</option>
                                                                    <option value="1963">1963</option>
                                                                    <option value="1962">1962</option>
                                                                    <option value="1961">1961</option>
                                                                    <option value="1960">1960</option>
                                                                    <option value="1959">1959</option>
                                                                    <option value="1958">1958</option>
                                                                    <option value="1957">1957</option>
                                                                    <option value="1956">1956</option>
                                                                    <option value="1955">1955</option>
                                                                    <option value="1954">1954</option>
                                                                    <option value="1953">1953</option>
                                                                    <option value="1952">1952</option>
                                                                    <option value="1951">1951</option>
                                                                    <option value="1950">1950</option>
                                                                    <option value="1949">1949</option>
                                                                    <option value="1948">1948</option>
                                                                    <option value="1947">1947</option>
                                                                    <option value="1946">1946</option>
                                                                    <option value="1945">1945</option>
                                                                    <option value="1944">1944</option>
                                                                    <option value="1943">1943</option>
                                                                    <option value="1942">1942</option>
                                                                    <option value="1941">1941</option>
                                                                    <option value="1940">1940</option>
                                                                    <option value="1939">1939</option>
                                                                    <option value="1938">1938</option>
                                                                    <option value="1937">1937</option>
                                                                    <option value="1936">1936</option>
                                                                    <option value="1935">1935</option>
                                                                    <option value="1934">1934</option>
                                                                    <option value="1933">1933</option>
                                                                    <option value="1932">1932</option>
                                                                    <option value="1931">1931</option>
                                                                    <option value="1930">1930</option>
                                                                    <option value="1929">1929</option>
                                                                    <option value="1928">1928</option>
                                                                    <option value="1927">1927</option>
                                                                    <option value="1926">1926</option>
                                                                    <option value="1925">1925</option>
                                                                    <option value="1924">1924</option>
                                                                    <option value="1923">1923</option>
                                                                    <option value="1922">1922</option>
                                                                    <option value="1921">1921</option>
                                                                    <option value="1920">1920</option>
                                                                    <option value="1919">1919</option>
                                                                    <option value="1918">1918</option>
                                                                    <option value="1917">1917</option>
                                                                    <option value="1916">1916</option>
                                                                    <option value="1915">1915</option>
                                                                    <option value="1914">1914</option>
                                                                    <option value="1913">1913</option>
                                                                    <option value="1912">1912</option>
                                                                    <option value="1911">1911</option>
                                                                    <option value="1910">1910</option>
                                                                    <option value="1909">1909</option>
                                                                    <option value="1908">1908</option>
                                                                    <option value="1907">1907</option>
                                                                    <option value="1906">1906</option>
                                                                    <option value="1905">1905</option>
                                                                    <option value="1904">1904</option>
                                                                    <option value="1903">1903</option>
                                                                    <option value="1902">1902</option>
                                                                    <option value="1901">1901</option>
                                                                    <option value="1900">1900</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select"
                                                                    name="female-month1" id="female-month1"
                                                                    onchange="updateDays('female')">
                                                                    <option value="" selected="" disabled="">-MM-
                                                                    </option>
                                                                    <option value="01">January</option>
                                                                    <option value="02">February</option>
                                                                    <option value="03">March</option>
                                                                    <option value="04">April</option>
                                                                    <option value="05">May</option>
                                                                    <option value="06">June</option>
                                                                    <option value="07">July</option>
                                                                    <option value="08">August</option>
                                                                    <option value="09">September</option>
                                                                    <option value="10">October</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">December</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select"
                                                                    name="female-date1" id="female-date1">
                                                                    <option value="" selected="" disabled="">-DD-
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 ">
                                                    <div class="row">
                                                        <label for="lastName" class="mb-1"><span
                                                                class="text-danger">*</span> Time of Birth</label><br>
                                                        <span class="text-danger" id="femaleBirth"> </span>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select"
                                                                    name="female-hour1" id="female-hour1">
                                                                    <option value="" selected="" disabled="">-HH-
                                                                    </option>
                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                    <option value="04">04</option>
                                                                    <option value="05">05</option>
                                                                    <option value="06">06</option>
                                                                    <option value="07">07</option>
                                                                    <option value="08">08</option>
                                                                    <option value="09">09</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select"
                                                                    name="female-minute1" id="female-minute1">
                                                                    <option value="" selected="" disabled="">-MM-
                                                                    </option>
                                                                    <option value="00">00</option>
                                                                    <option value="01">01</option>
                                                                    <option value="02">02</option>
                                                                    <option value="03">03</option>
                                                                    <option value="04">04</option>
                                                                    <option value="05">05</option>
                                                                    <option value="06">06</option>
                                                                    <option value="07">07</option>
                                                                    <option value="08">08</option>
                                                                    <option value="09">09</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                    <option value="32">32</option>
                                                                    <option value="33">33</option>
                                                                    <option value="34">34</option>
                                                                    <option value="35">35</option>
                                                                    <option value="36">36</option>
                                                                    <option value="37">37</option>
                                                                    <option value="38">38</option>
                                                                    <option value="39">39</option>
                                                                    <option value="40">40</option>
                                                                    <option value="41">41</option>
                                                                    <option value="42">42</option>
                                                                    <option value="43">43</option>
                                                                    <option value="44">44</option>
                                                                    <option value="45">45</option>
                                                                    <option value="46">46</option>
                                                                    <option value="47">47</option>
                                                                    <option value="48">48</option>
                                                                    <option value="49">49</option>
                                                                    <option value="50">50</option>
                                                                    <option value="51">51</option>
                                                                    <option value="52">52</option>
                                                                    <option value="53">53</option>
                                                                    <option value="54">54</option>
                                                                    <option value="55">55</option>
                                                                    <option value="56">56</option>
                                                                    <option value="57">57</option>
                                                                    <option value="58">58</option>
                                                                    <option value="59">59</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-control-group mb-3">
                                                                <select class="form-control form-select" name="ampm2"
                                                                    id="ampm2-f">
                                                                    <option value=""></option>
                                                                    <option value="AM">AM</option>
                                                                    <option value="PM">PM</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <label for="email" class="mb-1"><span class="text-danger">*</span>
                                                        Place of Birth</label>
                                                    <p>(Please select city from the list, do not enter full address)</p>
                                                    <br />
                                                    <span class="text-danger" id="femaleLoc"> </span>
                                                    <div class="form-control-group mb-3">
                                                        <!-- <input type="text" required data-location_input_prefix="female" class="form-control prokerala-location-input" placeholder="Place of Birth" name="location2" id="location2" value="hosur" autocomplete="off"/> -->
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <label for="mobile2" class="mb-1"><span class="text-danger">*</span>
                                                        Mobile Number</label>
                                                    <br />
                                                    <span class="text-danger" id="mobile2error"> </span>
                                                    <div class="form-control-group mb-3">
                                                        <input type="tel" class="form-control" name="mobile2"
                                                            id="mobile2" placeholder="Mobile Number" autocomplete="off"
                                                            maxlength="15" onkeyup="isNumberCheck(event)" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label for="email2" class="mb-1"> Email</label>
                                                    <br />
                                                    <span class="text-danger" id="femaleEmail"> </span>
                                                    <div class="form-control-group mb-3">
                                                        <input type="text" class="form-control" name="email2"
                                                            id="email2" placeholder="Email" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="padding-bottom:5px;"><span class="text-danger">*</span>
                                                    Select Your Preferred Match Making Method </label>
                                                <div class="text-danger" id="matchmethod"> </div>
                                                <div class="radio-group common-radio-btns match-method-new">
                                                    <div class="radio-item">
                                                        <label>
                                                            <input type="radio" name="matchmethod"
                                                                value="couplematch" />
                                                            Existing Couple Solution </label>
                                                    </div>
                                                    <div class="radio-item">
                                                        <label>
                                                            <input type="radio" name="matchmethod" value="complete"
                                                                checked />
                                                            New Alliance Match </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label style="padding-bottom:5px;"><span class="text-danger">*</span>
                                                    Primary User </label>
                                                <div class="radio-group common-radio-btns match-method-new">
                                                    <div class="radio-item">
                                                        <label>
                                                            <input type="radio" name="primary_user" value="male"
                                                                checked />
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="radio-item">
                                                        <label>
                                                            <input type="radio" name="primary_user" value="female" />
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="text-align:center">
                                            <input type="hidden" id="maletimezone" /><input type="hidden"
                                                id="femaletimezone" />
                                            <input type="hidden" id="malecoordinates" /><input type="hidden"
                                                id="femalecoordinates" />
                                            <input type="hidden" id="maleplace" name="maleplace" /><input type="hidden"
                                                id="femaleplace" name="femaleplace" />
                                            <button name="btnSave" value="btnSubmit" class="btn btn-mat"
                                                onclick="checkProfile();">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <i>
                    <h5 class="modal-title" id="lblAlert" style="font-weight: bold">Generates Accurate Marriage Matching
                        Report !</h5>
                </i>
                <img src='assets/img/loader.gif' class="loader-image" width='150px' height='150px'>
            </div>
        </div>
    </div>
</div>
<!-- modal for login proceed -->
<div class="modal fade" id="loginAwareModal" tabindex="-1" role="dialog" aria-labelledby="loginAwareModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>Please Login to Continue</p>
                <div class="text-center">
                    <button type="button" id="close_loginAwareModal" class="btn btn-primary">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    ul.cms-links {
        margin: 0;
        padding-left: 10px;
    }

    ul.cms-links li {
        font-size: 16px;
        list-style-type: circle;
        padding: 0;
        margin: 0px;
        color: #000;
    }

    ul.cms-links li a {
        color: #000;
    }

    .socialmedia-icons-footer {
        float: right;
        position: relative;
        top: 10px;
        left: 0;
        text-align: left;
    }
</style>



<!--build:js-->
<script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendors/swiper-bundle.min.js"></script>
<script src="assets/js/vendors/jquery.magnific-popup.min.js"></script>
<script src="assets/js/vendors/parallax.min.js"></script>
<script src="assets/js/vendors/aos.js"></script>
<script src="assets/js/vendors/massonry.min.js"></script>
<script src="assets/js/app.js"></script>
<!--endbuild-->

<div class="modal fade login-div-modal contact-form01" id="feedbackModal">
    <div class="modal-dialog modal-width">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h2> Feedback </h2>
                <button type="button" class="btn-close colis-btn" data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">
                <div class="modla-contact">
                    <div class="form-div-sections d-inline-block w-100">
                        <form name="feedback" action="feedback.php" method="post" enctype="multipart/form-data"
                            onsubmit="javascript:if(validateForm())showPopup();">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label> Feedback For </label>
                                        <div class="radio-group">
                                            <div class="radio-item"><label> <input type="radio"
                                                        class="form-check form-check-inline" name="feedbackfor"
                                                        value="Product" checked id="product"
                                                        onchange="showProduct()" />Product </label></div>
                                            <div class="radio-item"><label> <input type="radio"
                                                        class="form-check form-check-inline" name="feedbackfor"
                                                        value="Service" id="service" onchange="showProduct()" /> Service
                                                </label></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="productoption" class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label> Select Product </label>
                                        <select class="form-control form-select product-List" id="productlist"
                                            name="productlist">
                                            <option value="MyGenie">MyGenie</option>
                                            <option value="xSpaz">xSpaz</option>
                                            <option value="JenuineAstro">JenuineAstro</option>
                                            <option value="TarotTalk">TarotTalk</option>
                                            <option value="QuickDezider">QuickDezider</option>
                                            <option value="Premium Reports">Premium Reports</option>
                                            <option value="General Products">General Products</option>
                                            <option value="Integrated Matchmaking" selected>Integrated Matchmaking
                                            </option>
                                            <option value="Daily Automated Panchang">Daily Automated Panchang</option>
                                            <option value="Astrologer Public Page">Astrologer Public Page</option>
                                            <option value="Color Tool">Color Tool</option>
                                            <option value="Business Potential Tool">Business Potential Tool</option>
                                            <option value="Govt Job Tool">Govt Job Tool</option>
                                            <option value="Foreign Life Tool">Foreign Life Tool</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="serviceoption" class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label> Select Service </label>
                                        <select class="form-control form-select product-List" id="servicelist"
                                            name="servicelist">
                                            <option value="DoDiES">DoDiES</option>
                                            <option value="DoD">DoD</option>
                                            <option value="VB">VB</option>
                                            <option value="VBOT">VBOT</option>
                                            <option value="CSM">CSM</option>
                                            <option value="General Service">General Service</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <label> Feedback Category </label><br />
                                        <div class="radio-group gender-radio-btns">
                                            <div class="radio-item"><label><input type="radio"
                                                        class="form-check form-check-inline" name="feedbackcategory"
                                                        id="Positive" value="Positive"
                                                        onchange="showFeedbackOptions()" /> Positive </label></div>
                                            <div class="radio-item"><label><input type="radio"
                                                        class="form-check form-check-inline" name="feedbackcategory"
                                                        id="Negative" value="Negative"
                                                        onchange="showFeedbackOptions()" /> Negative </label></div>
                                            <div class="radio-item"><label><input type="radio"
                                                        class="form-check form-check-inline" name="feedbackcategory"
                                                        id="General" value="General" checked
                                                        onchange="showFeedbackOptions()" />General </label></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="positiveproduct" class="col-md-6">
                                <div class="form-group mt-2">
                                    <label> Positive </label>
                                    <select class="form-control form-select product-List" id="positiveproductlist"
                                        name="positiveproductlist">
                                        <option value="Useful Feature">Useful Feature</option>
                                        <option value="Easy Navigation">Easy Navigation</option>
                                        <option value="Good Look & Feel">Good Look & Feel</option>
                                        <option value="Good Performance of Fast PageLoading">Good Performance of Fast
                                            PageLoading</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div id="positiveservice" class="col-md-6">
                                <div class="form-group mt-2">
                                    <label> Positive </label>
                                    <select class="form-control form-select product-List" id="positiveservicelist"
                                        name="positiveservicelist">
                                        <option value="Useful Service">Useful Service</option>
                                        <option value="Easy to Reach">Easy to Reach</option>
                                        <option value="Good Experience">Good Experience</option>
                                        <option value="Fast Responses">Fast Responses</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div id="negativeproduct" class="col-md-6">
                                <div class="form-group mt-2">
                                    <label> Negative </label>
                                    <select class="form-control form-select product-List" id="negativeproductlist"
                                        name="negativeproductlist">
                                        <option value="Feature is not working">Feature is not working</option>
                                        <option value="Difficult to Navigate">Difficult to Navigate</option>
                                        <option value="Bad Look & Feel">Bad Look & Feel</option>
                                        <option value="Poor Performance of Slow PageLoading">Poor Performance of Slow
                                            PageLoading</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div id="negativeservice" class="col-md-6">
                                <div class="form-group mt-2">
                                    <label> Negative </label>
                                    <select class="form-control form-select product-List" id="negativeservicelist"
                                        name="negativeservicelist">
                                        <option value="Service is unavailable">Service is unavailable</option>
                                        <option value="Difficult to Reach">Difficult to Reach</option>
                                        <option value="Bad Experience">Bad Experience</option>
                                        <option value="Slow Responses">Slow Responses</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div id="generaltype" class="col-md-6">
                                <div class="form-group mt-2">
                                    <label> General </label>
                                    <select class="form-control form-select product-List" id="generallist"
                                        name="generallist">
                                        <option value="Sales">Sales</option>
                                        <option value="Service">Service</option>
                                        <option value="Partnership">Partnership</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mt-2">
                                    <label> Feedback Description </label><br />
                                    <textarea class="form-control" id="feedbackdesc" placeholder="Feedback Description"
                                        name="feedbackdesc" rows="4" style="height:80px; !important"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-4">
                                    <label> Attachment (s) </label><br />
                                    <input type="file" name="files[]" id="files[]" multiple />
                                </div>
                                <span class="text-red mt-2">Note : Your maximum upload size upto 2MB. Press CTRL button
                                    and select multiple files to upload.</span>
                            </div>
                            <div class="col-md-12 mt-3" style="text-align:center">
                                <input name="submitFeedback" type="submit" class="btn btn-submit btn-mat" value="Submit"
                                    onclick='submitFeedback()' />
                                <input type="hidden" id="action" value="submitFeedback" />
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $("#serviceoption").hide();
    $("#positiveproduct").hide();
    $("#negativeproduct").hide();
    $("#positiveservice").hide();
    $("#negativeservice").hide();

    function showProduct()
    {
        if(document.getElementById("product").checked)
        {
        $("#productoption").show();
        $("#serviceoption").hide();
        }
        if(document.getElementById("service").checked)
        {
        $("#productoption").hide();
        $("#serviceoption").show();
        }
        showFeedbackOptions();
    }

    function showFeedbackOptions()
    {    
        if((document.getElementById("product").checked) && (document.getElementById("Positive").checked))
        {
        $("#positiveproduct").show();
        $("#negativeproduct").hide();
        $("#positiveservice").hide();
        $("#negativeservice").hide();
        $("#generaltype").hide();
        }
        if((document.getElementById("product").checked) && (document.getElementById("Negative").checked))
        {
        $("#positiveproduct").hide();
        $("#negativeproduct").show();
        $("#positiveservice").hide();
        $("#negativeservice").hide();
        $("#generaltype").hide();
        }
        if((document.getElementById("product").checked) && (document.getElementById("General").checked))
        {
        $("#positiveproduct").hide();
        $("#negativeproduct").hide();
        $("#positiveservice").hide();
        $("#negativeservice").hide();
        $("#generaltype").show();      
        }
        if((document.getElementById("service").checked) && (document.getElementById("Positive").checked))
        {
        $("#positiveproduct").hide();
        $("#negativeproduct").hide();
        $("#positiveservice").show();      
        $("#negativeservice").hide();
        $("#generaltype").hide();
        }
        if((document.getElementById("service").checked) && (document.getElementById("Negative").checked))
        {
        $("#positiveproduct").hide();
        $("#negativeproduct").hide();
        $("#positiveservice").hide();
        $("#negativeservice").show();
        $("#generaltype").hide();
        }
        if((document.getElementById("service").checked) && (document.getElementById("General").checked))
        {
        $("#positiveproduct").hide();
        $("#negativeproduct").hide();
        $("#positiveservice").hide();
        $("#negativeservice").hide();
        $("#generaltype").show();
        }
    }

    function showPopup()
    {
        $('#modalCenter').modal('show');    
        setTimeout(function(){
        $('#modalCenter').modal('hide');
        }, 3000);
    }

    var fd = new FormData();

    $('input[type="file"]').on('change', function (e) {
        [].forEach.call(this.files, function (file) {
            fd.append('files[]', file);
        });
    });

  function validateForm()
  {
    var feedback = "";
    feedback = $("#feedbackdesc").val();
    if(feedback == "")
    {
      document.getElementById('alertMessage').innerHTML = "Feedback description should not be empty";
      return false;
    }
    else
      return true;
  }

  function submitFeedback()
  {
    var selectedPlatform = "";
    var productname = "";
    var servicename = "";
    var feedbackCategory = "";
    var feedbackType = "";
    var feedback = "";
        
    selectedPlatform = $("input[name='feedbackfor']:checked").val();
    if(selectedPlatform == "Product")
      productname = $("#productlist").val();
    else if(selectedPlatform == "Service")
      servicename = $("#servicelist").val();

    feedbackCategory = $("input[name='feedbackcategory']:checked").val();

    if((feedbackCategory == "Positive") && (selectedPlatform == "Product"))
    {
      feedbacktype = $("#positiveproductlist").val();
    }
    if((feedbackCategory == "Negative") && (selectedPlatform == "Product"))
    {
      feedbacktype = $("#negativeproductlist").val();
    }
    if((feedbackCategory == "Positive") && (selectedPlatform == "Service"))
    {
      feedbacktype = $("#positiveservicelist").val();
    }
    if((feedbackCategory == "Negative") && (selectedPlatform == "Service"))
    {
      feedbacktype = $("#negativeservicelist").val();
    }
    if(feedbackCategory == "General")
    {
      feedbacktype = $("#generallist").val();
    }

    feedback = $("#feedbackdesc").val();
  }   
</script>

@endsection