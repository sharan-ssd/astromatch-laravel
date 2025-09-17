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


<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        background: #ffffff;
        color: #333333;
        overflow-x: hidden;
        line-height: 1.6;
    }

    /* Logo */
    img.img-fluid.logo-white {
        height: 200px;
    }

    img.logo-color {
        width: 260px;
    }

    /* Animated Background */
    .cosmic-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /*background: linear-gradient(135deg, #fce4ec 0%, #f8bbd9 50%, #ffffff 100%);*/
        z-index: -2;
    }

    .hearts-animation {
        position: fixed;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    .heart {
        position: absolute;
        color: rgba(233, 30, 99, 0.3);
        animation: float 15s infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }

        10% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            transform: translateY(-100vh) rotate(360deg);
        }
    }

    /* Navigation */
    nav {
        position: fixed;
        top: 0;
        width: 100%;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        z-index: 1000;
        padding: 1rem 5%;
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(233, 30, 99, 0.1);
    }

    nav.scrolled {
        padding: 0.7rem 5%;
        box-shadow: 0 5px 20px rgba(233, 30, 99, 0.1);
    }

    .nav-container {
        max-width: 1400px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        font-size: 1.8rem;
        font-weight: bold;
        background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .cta-nav {
        background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
        color: white;
        padding: 0.7rem 2rem;
        border-radius: 30px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .cta-nav:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(233, 30, 99, 0.4);
    }

    /* Hero Section */
    .hero {
        /*min-height: 100vh;*/
        display: flex;
        align-items: center;
        padding: 0rem 2% 4rem;
        position: relative;
    }

    .hero-container {
        max-width: 1400px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: start;
    }

    .hero-content h2 {
        font-size: clamp(1.5rem, 3vw, 2rem);
        margin-top: 10rem;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .gradient-text {
        background: linear-gradient(135deg, #e91e63 0%, #c2185b 50%, #ad1457 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-content p {
        font-size: 1.3rem;
        color: #666666;
        margin-bottom: 2rem;
    }

    .trust-indicators {
        display: flex;
        gap: 2rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .trust-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #666666;
    }

    .hero-form {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        padding: 2rem;
        border-radius: 20px;
        border: 1px solid rgba(233, 30, 99, 0.2);
        box-shadow: 0 20px 40px rgba(233, 30, 99, 0.1);
        margin-top: 1rem;
    }

    .form-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .form-header h2 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .form-header p {
        color: #e91e63;
        font-size: 1.1rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #333333;
        font-weight: 500;
    }

    .form-group input {
        width: 100%;
        padding: 1rem;
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(233, 30, 99, 0.3);
        border-radius: 10px;
        color: #333333;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-group input:focus {
        outline: none;
        border-color: #e91e63;
        background: rgba(255, 255, 255, 1);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .submit-btn {
        width: 100%;
        padding: 1.2rem;
        background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 1.2rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(233, 30, 99, 0.4);
    }

    .form-footer {
        text-align: center;
        margin-top: 1rem;
        color: #666666;
        font-size: 0.9rem;
    }

    /* Social Proof Section */
    .social-proof {
        padding: 5rem 5%;
        background: rgba(233, 30, 99, 0.05);
    }

    .section-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .section-title {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 3rem;
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
    }

    .testimonial {
        background: rgba(255, 255, 255, 0.9);
        padding: 2rem;
        border-radius: 15px;
        border: 1px solid rgba(233, 30, 99, 0.2);
        position: relative;
        box-shadow: 0 10px 30px rgba(233, 30, 99, 0.1);
    }

    .testimonial::before {
        content: '"';
        position: absolute;
        top: -10px;
        left: 20px;
        font-size: 4rem;
        color: #e91e63;
        opacity: 0.3;
    }

    .testimonial-content {
        margin-bottom: 1.5rem;
        font-style: italic;
        color: #555555;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .author-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.2rem;
        color: #fff;
    }

    .author-info h4 {
        margin-bottom: 0.2rem;
        color: #333333;
    }

    .author-info p {
        color: #666666;
        font-size: 0.9rem;
    }

    .stars {
        color: #ffd700;
        margin-bottom: 0.5rem;
    }

    /* Features Section */
    .features {
        padding: 5rem 5%;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 3rem;
        margin-top: 3rem;
    }

    .feature {
        text-align: center;
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, rgba(233, 30, 99, 0.2) 0%, rgba(194, 24, 91, 0.2) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        border: 2px solid rgba(233, 30, 99, 0.3);
    }

    .feature h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: #333333;
    }

    .feature p {
        color: #666666;
        line-height: 1.8;
    }

    /* How It Works */
    .how-it-works {
        padding: 5rem 5%;
        background: rgba(233, 30, 99, 0.05);
    }

    .steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .step {
        text-align: center;
        position: relative;
    }

    .step-number {
        width: 60px;
        height: 60px;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: bold;
        color: #fff;
    }

    .step h3 {
        margin-bottom: 1rem;
        color: #333333;
    }

    .step p {
        color: #666666;
    }

    /* Pricing Section */
    .pricing {
        padding: 5rem 5%;
    }

    .pricing-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    .pricing-card {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(233, 30, 99, 0.2);
        border-radius: 20px;
        padding: 3rem 2rem;
        text-align: center;
        position: relative;
        transition: all 0.3s ease;
        box-shadow: 0 10px 30px rgba(233, 30, 99, 0.1);
    }

    .pricing-card.featured {
        border-color: #e91e63;
        transform: scale(1.05);
        color: #fff;
    }

    .pricing-card.featured::before {
        content: 'MOST POPULAR';
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
        padding: 0.5rem 1.5rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: bold;
    }

    .pricing-card:hover {
        transform: translateY(-5px);
        border-color: #e91e63;
    }

    .pricing-card.featured:hover {
        transform: scale(1.05) translateY(-5px);
    }

    .plan-name {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: #333333;
    }

    .plan-price {
        font-size: 3rem;
        font-weight: bold;
        background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
    }

    .plan-price span {
        font-size: 1rem;
        color: #666666;
    }

    .plan-features {
        list-style: none;
        margin: 2rem 0;
    }

    .plan-features li {
        padding: 0.7rem 0;
        color: #555555;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .plan-features li::before {
        content: 'âœ“';
        color: #e91e63;
        font-weight: bold;
    }

    /* FAQ Section */
    .faq {
        padding: 5rem 5%;
        background: rgba(255, 255, 255, 0.02);
    }

    .faq-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .faq-item {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .faq-question {
        padding: 1.5rem;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        /*color: #0463c5;*/
        color: #000;
        transition: all 0.3s ease;
    }

    .faq-question:hover {
        color: #e91e63;
    }

    .faq-question::after {
        content: '+';
        font-size: 1.5rem;
        color: #e91e63;
        transition: transform 0.3s ease;
    }

    .faq-item.active .faq-question::after {
        transform: rotate(45deg);
    }

    .faq-answer {
        padding: 0 1.5rem;
        max-height: 0;
        overflow: hidden;
        transition: all 0.3s ease;
        color: #b8b8b8;
    }

    .faq-item.active .faq-answer {
        padding: 0 1.5rem 1.5rem;
        max-height: 300px;
    }

    /* CTA Section */
    .final-cta {
        padding: 5rem 5%;
        text-align: center;
    }

    .final-cta h2 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    .final-cta p {
        font-size: 1.3rem;
        color: #b8b8b8;
        margin-bottom: 2rem;
    }

    .cta-button {
        display: inline-block;
        padding: 1.2rem 3rem;
        background: linear-gradient(135deg, #e91e63 0%, #c2185b 100%);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-size: 1.2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 40px rgba(233, 30, 99, 0.4);
    }

    /* Footer */
    footer {
        padding: 3rem 5%;
        text-align: center;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        color: #b8b8b8;
    }

    /* Responsive */
    @media (max-width: 968px) {
        .hero-container {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 5rem;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .trust-indicators {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .hero-content h2 {
            font-size: 1.5rem;
            margin-top: 1.5rem;
            padding-right: 1rem;
        }

        .hero-content p {
            padding-right: 2rem;
        }

        .testimonials-grid {
            grid-template-columns: 1fr;
        }

        .trust-indicators {
            padding-right: 1rem;
        }

        .hero-form {
            padding: 0.5rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .steps {
            grid-template-columns: 1fr;
        }

        .pricing-card.featured {
            transform: scale(1);
        }
    }

    .tooltip-box {
        display: none;
        /* Initially hidden */
        background: white;
        border: 1px solid #ccc;
        padding: 10px;
        position: absolute;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        width: auto;
        max-width: 300px;
        border-radius: 15px;
        font-size: 10px;
        text-align: center;
        white-space: normal;
    }

    @media (max-width: 600px) {
        .tooltip-box {
            max-width: 250px;
            /* Smaller width for mobile */
            font-size: 12px;
            /* Reduce font size */
            padding: 5px;
        }
    }

    .signup-form {
        float: left;
        width: 100%;
        margin: 0 auto;
    }

    .signup-form-two {
        width: 60%;
        margin: 0 auto !important;
        background: #f6f6f6;
        padding: 15px;
        border: 1px solid #B90075;
        border-radius: 15px;
    }

    .bg-field {
        background: #f3f3f3;
        padding: 10px;
        border-left: 2px solid red;
    }

    span.error {
        color: red;
        font-size: 12px;
    }

    @media only screen and (max-width: 991px) {
        .signup-form-two {
            width: 100%;
            margin: 0 auto !important;
            background: #f6f6f6;
            padding: 15px;
            border: 1px solid #B90075;
            border-radius: 15px;
        }

        .a.social_bt.google {
            width: 80% !important;
        }

        span.or-button::before {
            content: '';
            height: 2px;
            width: 10%;
            background: #e9e9e9;
            float: none;
            display: inline-flex;
            margin-right: 7px;
        }

        span.or-button::after {
            content: '';
            height: 2px;
            width: 10%;
            background: #e9e9e9;
            float: none;
            display: inline-flex;
            margin-left: 7px;
        }

        .home-second-content {
            position: relative;
            top: 20px !important;
        }
    }

    @media only screen and (max-width: 443px) {
        .a.social_bt.google {
            width: 80% !important;
        }
    }

    #compatibility-check {
        scroll-margin-top: 200px !important;
    }

    /*Slider Css Starts*/

    .wrapper {
        padding: 0;
    }

    .slider {
        overflow: hidden;
        margin: 0px !important;
        padding: 0px;
    }

    .slider__inner {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        transform: translateX(var(--slider-offset));
        transition-property: transform;
        transition-duration: var(--slider-time);
        transition-timing-function: ease;
        will-change: transform;
    }

    .slider__item {
        flex: 1 0 100%;
        box-sizing: border-box;
        position: relative;
        width: 100%;
        height: auto;
    }

    .slider__image {
        width: 100%;
        height: auto;
        transform: translateX(0);
        animation-delay: var(--slide-distortion-delay), var(--slide-reset-delay);
        animation-duration: var(--slide-distortion-time), var(--slide-reset-time);
        animation-fill-mode: forwards, forwards;
        animation-direction: normal, reverse;
    }

    .slider__image:not(:first-child) {
        position: absolute;
        top: 0;
        left: 0;
    }

    .slider__image:nth-child(1) {
        clip-path: inset(0 0 calc(var(--rate) * 4) 0);
    }

    .slider__image:nth-child(2) {
        clip-path: inset(calc(var(--rate) * 1) 0 calc(var(--rate) * 3) 0);
    }

    .slider__image:nth-child(3) {
        clip-path: inset(calc(var(--rate) * 2) 0 calc(var(--rate) * 2) 0);
    }

    .slider__image:nth-child(4) {
        clip-path: inset(calc(var(--rate) * 3) 0 calc(var(--rate) * 1) 0);
    }

    .slider__image:nth-child(5) {
        clip-path: inset(calc(var(--rate) * 4) 0 0 0);
    }

    // Animation
    .slider__item--animating .slider__image:nth-child(1) {
        animation-name: animation-1, animation-1;
    }

    .slider__item--animating .slider__image:nth-child(2) {
        animation-name: animation-2, animation-2;
    }

    .slider__item--animating .slider__image:nth-child(3) {
        animation-name: animation-3, animation-3;
    }

    .slider__item--animating .slider__image:nth-child(4) {
        animation-name: animation-4, animation-4;
    }

    .slider__item--animating .slider__image:nth-child(5) {
        animation-name: animation-5, animation-5;
    }

    // Keyframes
    @keyframes animation-1 {
        from {
            transform: translateX(0);
        }

        to {
            // transform: translateX(-50px);
            transform: translateX(-5vw);
        }
    }

    @keyframes animation-2 {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-3vw);
        }
    }

    @keyframes animation-3 {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(1vw);
        }
    }

    @keyframes animation-4 {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(3vw);
        }
    }

    @keyframes animation-5 {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-1vw);
        }
    }

    @keyframes slide {
        to {
            transform: translateX(-100%);
        }
    }

    /*Slider Css Ends*/


    .home-second-content {
        position: relative;
        top: 70px;
        margin-bottom: 30px;
    }

    .form-control,
    .btn {
        border-radius: 0.5rem;
    }

    .form-box {
        background-color: rgb(242, 242, 242);
        border-radius: 1rem;
        padding: 2rem;
    }
</style>
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

        <div class="hero-form" id="new_partner_details_form">
            <div class="form-header">
                <h2>Get Your Free Compatibility Score</h2>
                <p>Limited Time: Free Basic Report</p>
            </div>

            <form method="post" action="/submit-horoscope">
                @csrf
                <div class="form-group">
                    <label class="form-label">Your's Fullname <span style='color:#e91e63; font-weight:bold;'>(Male
                            Horoscope)</span></label>
                    <input type="text" id="fullname_male" class="form-control"
                        placeholder="Full Name" required>
                    <span class="error" id="fullname_male_error"></span>
                </div>

                <div class="form-group">
                    <label class="form-label">Your Date of Birth</label>
                    <!--<input type="date" onchange="date_split('male', this)" id="birth_date_male" class="form-control">-->
                    <div class="row">
                        <div class="col-sm-4 ">
                            <div class="form-control-group mb-3">
                                <select class="form-control form-select" name="male-year" id="male-year"
                                    onchange="updateDays('male')" required>
                                    <option value="" selected="" disabled="">-YYYY-</option>
                                    @for ($i = date('Y'); $i >= 1950; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="form-control-group mb-3">
                                <select class="form-control form-select" name="male-month" id="male-month"
                                    onchange="updateDays('male')" required>
                                    <option value="" selected="" disabled="">-MM-</option>
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
                                <select class="form-control form-select" name="male-date" id="male-date"
                                    onchange="setBirthDate('male')" required>
                                    <option value="" selected="" disabled="">-DD-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <span class="error" id="d_error"></span>
                </div>
                <div class="form-group">
                    <label class="form-label">Your Time of Birth</label>
                    <!--<input type="time" onchange="time_split('male', this)" id="birth_time_male" class="form-control">-->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-control-group mb-3">
                                <select class="form-control form-select" name="male-hour" id="male-hour" required>
                                    <option value="" selected="" disabled="">-HH-</option>
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
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="form-control-group mb-3">
                                <select class="form-control form-select" name="male-minute" id="male-minute" required>
                                    <option value="" selected="" disabled="">-MM-</option>
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
                                <select class="form-control form-select" name="ampm1" id="ampm1" required
                                    onchange="setBirthTime('male')">
                                    <option value="">-AM / PM-</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <span class="error" id="birth_time_male_error"></span>
                </div>

                <div class="form-group">
                    <label class="form-label">Your Place of Birth</label>
                    <input type="text" data-location_input_prefix="male" class="form-control prokerala-location-input"
                        name="location1" id="location1" placeholder="Place of Birth" autocomplete="off" required />
                    <span class="error" id="location1_error"></span>
                </div>

                <div class="form-group">
                    <label class="form-label">Partner's Fullname <span style='color:#e91e63; font-weight:bold;'>(Female
                            Horoscope)</span></label>
                    <input type="text" id="fullname_female"
                        required class="form-control"
                        placeholder="Full Name">
                    <span class="error" id="fullname_female_error"></span>
                </div>


                <div class="form-group">
                    <label class="form-label">Partner's Date of Birth</label>

                    <!-- <input type="date" onchange="date_split('female', this)" id="birth_date_female" class="form-control"> -->

                    <div class="row">
                        <div class="col-sm-4 ">
                            <div class="form-control-group mb-3">
                                <select class="form-control form-select" name="female-year" id="female-year"
                                    onchange="updateDays('female')" required>
                                    <option value="" selected="" disabled="">-YYYY-</option>
                                    @for ($i = date('Y'); $i >= 1950; $i--)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="form-control-group mb-3">
                                <select class="form-control form-select" name="female-month" id="female-month"
                                    onchange="updateDays('female')">
                                    <option value="" selected="" disabled="">-MM-</option>
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
                                <select class="form-control form-select" name="female-date" id="female-date"
                                    onchange="setBirthDate('female')">
                                    <option value="" selected="" disabled="">-DD-</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <span class="error" id="birth_date_female_error"></span>
                </div>
                <div class="form-group">
                    <label class="form-label">Partner's Time of Birth</label>
                    <!-- <input type="time" onchange="time_split('female', this)" id="birth_time_female" class="form-control"> -->

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-control-group mb-3">
                                <select class="form-control form-select" name="female-hour" id="female-hour">
                                    <option value="" selected="" disabled="">-HH-</option>
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
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="form-control-group mb-3">
                                <select class="form-control form-select" name="female-minute" id="female-minute">
                                    <option value="" selected="" disabled="">-MM-</option>
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
                                <select class="form-control form-select" name="ampm2" id="ampm2"
                                    onchange="setBirthTime('female')">
                                    <option value="">-AM / PM-</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <span class="error" id="birth_time_female_error"></span>
                </div>

                <div class="form-group">
                    <label class="form-label">Partner's Place of Birth</label>
                    <input type="text" data-location_input_prefix="female" class="form-control prokerala-location-input"
                        name="location2" id="location2" placeholder="Place of Birth" autocomplete="off" />
                    <span class="error" id="location2_error"></span>
                </div>

                <div class="form-group">
                    <label class="form-label">Your Email</label>
                    <input type="email" id="partner_email"
                        onkeyup="((e) => localStorage.setItem('partner_email', e.target.value))(event)"
                        class="form-control" placeholder="Email">
                    <span class="error" id="email_error"></span>
                </div>
                <button type="button" onclick="this.form.submit();" class="btn btn-mat  w-100">Check Your
                    Compatibility</button>
                <p class="form-footer">
                    🔒 We respect your privacy. No spam, ever.
                </p>
        </div>
        </form>
        <div class="mt-3" id="social_login" style="display: none;">
            <div class="card shadow-sm">
                <div class="card-body text-center" style="margin:50px 20px;">
                    <h5 class="card-title mb-4">Please Login to Continue</h5>
                    <div class="access_social">
                        <a href="https://accounts.google.com/o/oauth2/v2/auth?response_type=code&access_type=online&client_id=433035171636-mjs1qgep3i5mgf94u6tnrbvj0m9f36dp.apps.googleusercontent.com&redirect_uri=https%3A%2F%2Fastromatch.online%2Fgoogle-login.php&state&scope=email%20profile&prompt=select_account"
                            title="Continue with Google" class="social_bt google mb-3"><img src="assets/img/google.png"
                                title="Google Login" class="google-img">Register with Google</a>
                        <a href="javascript:void(0);" title="Continue with Facebook"
                            class="social_bt facebook mb-3 d-none">Continue with Facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <form id="profiles" action="newhoroscope.php" method="post"
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
<script>
    const ANIMATING_CLASS = 'slider__item--animating';

const Slider = {
  init() {
    this.sliderEl = document.querySelector('.slider');
    this.slideInnerEl = document.querySelector('.slider__inner');
    this.sliderItemsEl = document.querySelectorAll('.slider__item');
    this.offset = 0;
    this.direction = 'left';
    this.maxOffset = (this.sliderItemsEl.length - 1) * 100;

    this.slideInnerEl.addEventListener('transitionend', this.onSliderTransitionEnd.bind(this));
    setInterval(this.slide.bind(this), 3000);
  },
  slide() {
    if (this.isMaxLeft()) {
      this.direction = 'right';
    } else if (this.isMaxRight()) {
      this.direction = 'left';
    }

    this.moveSlider();
  },
  isMaxLeft() {
    return this.offset <= -this.maxOffset;
  },
  isMaxRight() {
    return this.offset >= 0;
  },
  getCurrentPage() {
    if (this.offset < 0) {
      return (this.offset * -1) / 100;
    }

    return this.offset / 100;
  },
  getSignal() {
    return this.direction === 'left' ? -1 : 1;
  },
  onSliderTransitionEnd() {
    const signal = this.getSignal();
    const currentPage = this.getCurrentPage();

    this.sliderItemsEl.forEach(element => element.classList.remove(ANIMATING_CLASS));
  },
  moveSlider() {
    const signal = this.getSignal();
    const currentPage = this.getCurrentPage();

    this.offset = this.offset + (signal * 100);
    this.sliderItemsEl[currentPage].classList.add(ANIMATING_CLASS);
    this.sliderItemsEl[currentPage + (-1 * signal)].classList.add(ANIMATING_CLASS);
    this.slideInnerEl.style.setProperty('--slider-offset', `${this.offset}%`);
  }
};

// const slider = Object.create(Slider);
// slider.init();

</script>
<!--<script src="js/location-search.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.1/build/js/intlTelInput.min.js"></script>
<script>
    function viewPassword() 
    {
        var currentPassword = document.getElementById("password");

        if (currentPassword.type === "password") {
            currentPassword.type = "text";
            $(".open_eye_current").hide();
            $(".close_eye_current").show();
        } else {
            currentPassword.type = "password";
            $(".open_eye_current").show();
            $(".close_eye_current").hide();
        }
    }

    function setPrimaryHoroscope(argument)
    {
        if(argument == "1")
        {
            document.getElementById("primarygender").value = "Male";
        }
        else
        {
            document.getElementById("primarygender").value = "Female";
        }
    }

    let nameValidateError = "Please input your name only in English. Name should not contain any special characters or numbers";
    function validateName() 
    {
        document.getElementById('nameError').innerHTML = "";
        // Regular expression to match English characters (A-Z, a-z)
        var englishRegex = /^[A-Za-z\s]+$/;

        // Get the input value
        var inputValue = document.getElementById('username').value;

        // Check if the input contains non-English characters
        if (!englishRegex.test(inputValue)) {
            document.getElementById('nameError').innerHTML = nameValidateError;
            $("#username").focus();
        }
    }

    function validateMaleName() {
        let inputField = document.getElementById("fullname1");
        let inputValue = inputField.value.trim(); // Trim extra spaces

        // Regular expression to allow only letters and spaces
        let regex = /^[A-Za-z\s]+$/;

        if (!regex.test(inputValue)) {
            alert("Full name should not contain numbers or special characters.");
            inputField.value = ""; // Clear the input field
            inputField.focus(); // Refocus the input field
        }
    }

    function validateFemaleName() {
        let inputField = document.getElementById("fullname2");
        let inputValue = inputField.value.trim(); // Trim spaces from the beginning and end

        // Regular expression to allow only letters and spaces
        let regex = /^[A-Za-z\s]+$/;

        if (!regex.test(inputValue)) {
            alert("Full name should only contain letters and spaces.");
            inputField.value = inputValue.replace(/[^A-Za-z\s]/g, ''); // Remove invalid characters
        }
    }

    const input = document.querySelector("#mobile");
    window.intlTelInput(input, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.1/build/js/utils.js",
        initialCountry: "IN",
        separateDialCode: true,
        autoPlaceholder: "off",
        formatOnDisplay: false // Disable format on display to prevent spaces
    });

    document.getElementById('mobile').addEventListener('input', function (e) {
        e.target.value = e.target.value.replace(/\s+/g, '');
    });

    const input1 = document.querySelector("#mobile1");
    window.intlTelInput(input1, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.1/build/js/utils.js",
        initialCountry: "IN",
        separateDialCode: true,
        autoPlaceholder: "off",
        formatOnDisplay: false // Disable format on display to prevent spaces
    });

    document.getElementById('mobile1').addEventListener('input1', function (e) {
        e.target.value = e.target.value.replace(/\s+/g, '');
        alert("hi");
    });

    const input2 = document.querySelector("#mobile2");
    window.intlTelInput(input2, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.1/build/js/utils.js",
        initialCountry: "IN",
        separateDialCode: true,
        autoPlaceholder: "off",
        formatOnDisplay: false // Disable format on display to prevent spaces
    });

    document.getElementById('mobile2').addEventListener('input2', function (e) {
        e.target.value = e.target.value.replace(/\s+/g, '');
    });

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46) {
            return false;
        }
        return true;
    }

    function isEmailValid(evt) {
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailPattern.test(emailInput.value)) {
            emailError.innerText = 'Please enter a valid email address.';
            evt.preventDefault(); // Prevent form submission
        } else {
            emailError.innerText = ''; // Clear any previous error messages
        }
    }

    function checkDay(ctlindex)
    {
        var day = $("#date"+ctlindex).val();
        if((parseInt(day)< 0) || (parseInt(day) > 31))
        {
        if(ctlindex == 1)
            document.getElementById('maleDOB').innerHTML = "Day value should be 1 to 31";
        else
            document.getElementById('femaleDOB').innerHTML = "Day value should be 1 to 31";

        $("#date"+ctlindex).focus();
        }
        else
        {
        if(day.length == 1)
        {
            day = "0" + day;
            $("#date"+ctlindex).val(day);
            if(ctlindex == 1)
            document.getElementById('maleDOB').innerHTML = "";
            else
            document.getElementById('femaleDOB').innerHTML = "";
        }
        else
        {
            if(ctlindex == 1)
            document.getElementById('maleDOB').innerHTML = "";
            else
            document.getElementById('femaleDOB').innerHTML = "";          
        }
        }    
    }

    function checkMonth(ctlindex)
    {
        var month = $("#month"+ctlindex).val();
        if((parseInt(month)< 0) || (parseInt(month) > 12))
        {
        if(ctlindex == 1)
            document.getElementById('maleDOB').innerHTML = "Month value should be 1 to 12";
        else
            document.getElementById('femaleDOB').innerHTML = "Month value should be 1 to 12";
        $("#month"+ctlindex).focus();
        }
        else
        {
        if(month.length == 1)
        {
            month = "0" + month;
            $("#month"+ctlindex).val(month);
            if(ctlindex == 1)
            document.getElementById('maleDOB').innerHTML = "";
            else
            document.getElementById('femaleDOB').innerHTML = "";
        }
        else
        {
            if(ctlindex == 1)
            document.getElementById('maleDOB').innerHTML = "";
            else
            document.getElementById('femaleDOB').innerHTML = "";
        }
        }
    }

    function checkHour(ctlindex)
    {
        var hour = $("#hour"+ctlindex).val();
        if((parseInt(hour) < 1) || (parseInt(hour) > 12))
        {
        if(ctlindex == 1)
            document.getElementById('maleBirth').innerHTML = "Hour value should be 1 to 12";
        else
            document.getElementById('femaleBirth').innerHTML = "Hour value should be 1 to 12";
        $("#hour"+ctlindex).focus();
        }
        else
        {
        if(hour.length == 1)
        {
            hour = "0" + hour;
            $("#hour"+ctlindex).val(hour);
            if(ctlindex == 1)
            document.getElementById('maleBirth').innerHTML = "";
            else
            document.getElementById('femaleBirth').innerHTML = "";
        }
        else
        {
            if(ctlindex == 1)
            document.getElementById('maleBirth').innerHTML = "";
            else
            document.getElementById('femaleBirth').innerHTML = "";
        }
        }    
    }

    function checkMinute(ctlindex)
    {
        var minute = $("#minute"+ctlindex).val();
        if((parseInt(minute) < 0) || (parseInt(minute) > 59))
        {
        if(ctlindex == 1)
            document.getElementById('maleBirth').innerHTML = "Minute value should be 1 to 59";
        else
            document.getElementById('femaleBirth').innerHTML = "Minute value should be 1 to 59";
        $("#minute"+ctlindex).focus();
        }
        else
        {
        if(minute.length == 1)
        {
            minute = "0" + minute;
            $("#minute"+ctlindex).val(minute);
            if(ctlindex == 1)
            document.getElementById('maleBirth').innerHTML = "";
            else
            document.getElementById('femaleBirth').innerHTML = "";
        }
        else
        {
            if(ctlindex == 1)
            document.getElementById('maleBirth').innerHTML = "";
            else
            document.getElementById('femaleBirth').innerHTML = "";
        }
        }
    }

    function checkYear(ctlindex)
    {
        var currentyear = new Date().getFullYear();
        var year = $("#year"+ctlindex).val();
        if((parseInt(year)< 1900) || (parseInt(year) > currentyear))
        {
            if(ctlindex == 1)
            document.getElementById('maleDOB').innerHTML = "Year value should be 1900 to " + currentyear;
            else
            document.getElementById('femaleDOB').innerHTML = "Year value should be 1900 to " + currentyear;
            $("#year"+ctlindex).focus();
        }
        else if(year.length < 4)
        {
            if(ctlindex == 1)
            document.getElementById('maleDOB').innerHTML = "Year value should be in 4 digits as like 1900";
            else
            document.getElementById('femaleDOB').innerHTML = "Year value should be in 4 digits as like 1900";
            $("#year"+ctlindex).focus();
        }
        else
        {
            if(ctlindex == 1)
            document.getElementById('maleDOB').innerHTML = "";
            else
            document.getElementById('femaleDOB').innerHTML = "";
        }
    }
    
    
    function checkProfile(event) {  
        let isValid = true;
    
        // Validate male full name
        let fullname1 = document.getElementById("fullname1");
        if (fullname1.value.trim() === "") {
            document.getElementById('maleName').innerText = "Please enter fullname";
            isValid = false;
        } else {
            document.getElementById('maleName').innerText = "";
        }
        validateMaleName();
    
        // Validate female full name
        let fullname2 = document.getElementById("fullname2");
        if (fullname2.value.trim() === "") {
            document.getElementById('femaleName').innerText = "Please enter fullname";
            isValid = false;
        } else {
            document.getElementById('femaleName').innerText = "";
        }
        validateFemaleName();
    
        // Male DOB
        let maledate = document.getElementById("male-date").value;
        let malemonth = document.getElementById("male-month").value;
        let maleyear = document.getElementById("male-year").value;
        if (maleyear === "") {
            document.getElementById('maleDOB').innerText = "Please select year";
            isValid = false;
        } else if (malemonth === "") {
            document.getElementById('maleDOB').innerText = "Please select month";
            isValid = false;
        } else if (maledate === "") {
            document.getElementById('maleDOB').innerText = "Please select date";
            isValid = false;
        } else if (!isValidDate(maledate, malemonth, maleyear)) {
            document.getElementById('maleDOB').innerText = "Please select date";
            isValid = false;
        } else {
            document.getElementById('maleDOB').innerText = "";
        }
    
        // Female DOB
        let femaledate = document.getElementById("female-date").value;
        let femalemonth = document.getElementById("female-month").value;
        let femaleyear = document.getElementById("female-year").value;
        if (femaleyear === "") {
            document.getElementById('femaleDOB').innerText = "Please select year";
            isValid = false;
        } else if (femalemonth === "") {
            document.getElementById('femaleDOB').innerText = "Please select month";
            isValid = false;
        } else if (femaledate === "") {
            document.getElementById('femaleDOB').innerText = "Please select date";
            isValid = false;
        } else if (!isValidDate(femaledate, femalemonth, femaleyear)) {
            document.getElementById('femaleDOB').innerText = "Please select date";
            isValid = false;
        } else {
            document.getElementById('femaleDOB').innerText = "";
        }
    
        // Male time of birth
        let malehour = document.getElementById("male-hour").value;
        let maleminute = document.getElementById("male-minute").value;
        let ampm1 = document.getElementById("ampm1").value;
        if (malehour === "") {
            document.getElementById('maleBirth').innerText = "Please select hour";
            isValid = false;
        } else if (maleminute === "") {
            document.getElementById('maleBirth').innerText = "Please select minute";
            isValid = false;
        } else if (ampm1 === "") {
            document.getElementById('maleBirth').innerText = "Please select AM/PM";
            isValid = false;
        } else if (!isValidTime(malehour, maleminute)) {
            document.getElementById('maleBirth').innerText = "Please enter a valid time";
            isValid = false;
        } else {
            document.getElementById('maleBirth').innerText = "";
        }
    
        // Female time of birth
        let femalehour = document.getElementById("female-hour").value;
        let femaleminute = document.getElementById("female-minute").value;
        let ampm2 = document.getElementById("ampm2").value;
        if (femalehour === "") {
            document.getElementById('femaleBirth').innerText = "Please select hour";
            isValid = false;
        } else if (femaleminute === "") {
            document.getElementById('femaleBirth').innerText = "Please select minute";
            isValid = false;
        } else if (ampm2 === "") {
            document.getElementById('femaleBirth').innerText = "Please select AM/PM";
            isValid = false;
        } else if (!isValidTime(femalehour, femaleminute)) {
            document.getElementById('femaleBirth').innerText = "Please enter a valid time";
            isValid = false;
        } else {
            document.getElementById('femaleBirth').innerText = "";
        }
    
        // Male location
        let maletimezone = document.getElementsByName("maletimezone")[0].value;
        let femaletimezone = document.getElementsByName("femaletimezone")[0].value;
        let malecoordinates = document.getElementsByName("malecoordinates")[0].value;
        let femalecoordinates = document.getElementsByName("femalecoordinates")[0].value;
        let location1 = document.getElementById("location1");
        if (location1.value.trim() === "" || malecoordinates === "" || maletimezone === "") {
            document.getElementById('maleLoc').innerText = "Please select place of birth";
            isValid = false;
        } else {
            document.getElementById('maleLoc').innerText = "";
        }
    
        // Female location
        let location2 = document.getElementById("location2");
        if (location2.value.trim() === "" || femalecoordinates === "" || femaletimezone === "") {
            document.getElementById('femaleLoc').innerText = "Please select place of birth";
            isValid = false;
        } else {
            document.getElementById('femaleLoc').innerText = "";
        }
    
        // Match method
        let matchmethod = document.querySelector('input[name="matchmethod"]:checked');
        if (!matchmethod) {
            document.getElementById('matchmethod').innerText = "Please Select a Match Making Method.";
            isValid = false;
        } else {
            document.getElementById('matchmethod').innerText = "";
        }
    
        // Mobile validation
        if (!validateMobileNumber("#mobile1")) { 
            isValid = false;
        }
        if (!validateMobileNumber("#mobile2")) {
            isValid = false;
        }
    
        // Final submission
        if (isValid) {
            document.getElementById("maletimezone").value = maletimezone;
            document.getElementById("malecoordinates").value = malecoordinates;
            document.getElementById("maleplace").value = location1.value;
            document.getElementById("femaletimezone").value = femaletimezone;
            document.getElementById("femalecoordinates").value = femalecoordinates;
            document.getElementById("femaleplace").value = location2.value;
    
            document.getElementById("profiles_form").value = 1;

            // If user is not logged in, show login modal
            event.preventDefault();
            addtoStorage();
            if(userId === ''){
                localStorage.setItem("submit_after_login", 'true');
                $("#loginAwareModal").modal('show');
                $("#socialLoginDiv").show();
                $("#horoscopeDiv").hide();
                document.getElementById("socialLoginDiv").scrollIntoView();
            }else{
                $("#modalCenter").modal("show");
                submitToPHP().then((result) => {
                    clearPersistedInputs();
                });
                return true;
            }
            return false;
            
        } else {
            event.preventDefault();
            return false;
        }
    }
    
    $('#close_loginAwareModal').click(function() {
        $("#loginAwareModal").modal('hide');
        $("#socialLoginDiv").show();
        $("#horoscopeDiv").hide();
    });

    var messages = [];
    messages[0] = "Saving Planet Positions !";
    messages[1] = "Verifying Horoscope Match !";
    messages[2] = "Generates Accurate Marriage Matching Report !";
    function showPopup() 
    {
        event.preventDefault();
        //console.log("showPopup function called : " + messages[0]);
        $('#modalCenter').modal('show');

        timer = 10000;

        for (let i = 0; i < messages.length; i++) {
        setTimeout(function() {
            document.getElementById('lblAlert').innerText = messages[i];
        }, timer);
            timer = timer + 6000;
        }
    }

    // Helper function to validate date
    function isValidDate(day, month, year) {
        let date = new Date(year, month - 1, day);
        return date && (date.getMonth() + 1) == month && date.getDate() == Number(day) && date.getFullYear() == Number(year);
    }

    // Helper function to validate time
    function isValidTime(hour, minute) {
        let h = parseInt(hour);
        let m = parseInt(minute);
        return h >= 1 && h <= 12 && m >= 0 && m <= 59;
    }

    function updateDays(gender) {        
        const year = document.getElementById(gender + "-year").value;
        const month = document.getElementById(gender + "-month").value;
        const dayDropdown = document.getElementById(gender + "-date");
        dayDropdown.innerHTML = ""; // Clear the current options

        let daysInMonth = 31; // Default for months with 31 days
        if (month == 4 || month == 6 || month == 9 || month == 11) {
        daysInMonth = 30; // April, June, September, November have 30 days
        } else if (month == 2) {
        // Check for leap year
        if ((year % 4 === 0 && year % 100 !== 0) || year % 400 === 0) {
            daysInMonth = 29; // February in a leap year
        } else {
            daysInMonth = 28; // February in a non-leap year
        }
        }

        let option = document.createElement("option");
        option.value = "";
        option.text = "-DD-";
        dayDropdown.appendChild(option);

        // Populate the day dropdown with the correct number of days
        for (let day = 1; day <= daysInMonth; day++) {
        let formattedDay = String(day).padStart(2, '0'); // Pad with leading zeros
        let option = document.createElement("option");
        option.value = formattedDay;
        option.text = formattedDay;
        dayDropdown.appendChild(option);
        }
    }

    function checkDuplicateMobile()
    {
        const input = document.querySelector('#mobile');
        const iti = intlTelInput.getInstance(input);
        const countryData = iti.getSelectedCountryData();
        var isdCode = countryData.dialCode;
        let mobile = document.getElementById('mobile').value;
        const mobileError = document.getElementById('mobileError');
        let email = document.getElementById('email').value;
        mobileError.innerText = "";
        //console.log("Check Duplicate Function Called");
        //console.log("ISD Code : " + isdCode + " Mobile : " + mobile + " Email : " + email);
        if(mobile == "")
        {
            mobileError.innerText = "Please enter mobile number";
            return;
        }
        else
        {
            mobileError.innerText = "";
        }

        $.ajax({
            url: 'checkDuplicate.php',
            type: 'POST',            
            dataType: 'text',        
            data: "checkDuplicateMobile=Y&checkDuplicateEmail=N&validateLogin=N&validateOTP=N&mobile=" + mobile + "&isdCode=" + isdCode + "&email=" + email,
            success: function (data) {      
                //console.log(data);
                if(data != "")
                {
                    isValid = false;        
                    mobileError.innerText = data;
                }
                else
                {
                    isValid = true;
                    $("#sendotp").hide();
                    $("#verifyotp").show();
                    $("#mobile").attr("readonly", true);
                }      
            }
        });
    }

    function checkDuplicateEmail()
    {
        let email = document.getElementById('email').value;
        const emailError = document.getElementById('emailError');
        emailError.innerText = "";
        $.ajax({
            url: 'checkDuplicate.php',
            type: 'POST',            
            dataType: 'text',        
            data: "checkDuplicateMobile=N&checkDuplicateEmail=Y&validateLogin=N&validateOTP=N&email=" + email,
            success: function (data) {      
                //alert(data);
                if(data != "")
                {
                    isValid = false;        
                    emailError.innerText = data;
                }
                else
                {
                    isValid = true;
                }
            }
        });
    }

    function verifyMobile()
    {
        let otp = document.getElementById("otp").value;   
        let otp_verified = document.getElementById("valid_otp");   
        if(otp.length < 4){
            return;
        }
        if(otp == "")
        {
            document.getElementById("otpError").innerText = "Please enter OTP sent to your mobile";
        }
        else
        {
            $.ajax({
                url: 'checkDuplicate.php',
                type: 'POST',            
                dataType: 'text',                        
                data: "checkDuplicateMobile=N&checkDuplicateEmail=N&validateLogin=N&validateOTP=Y&otp=" + otp,
                success: function (data) {      
                    //alert(data);
			//console.log("validate otp : " + data);
                    if(data == "yes")
                    {
                        document.getElementById("otpError").innerText = "";
			$("#btnVerifyOTP").hide();
                        $("#btnSignup").removeClass("register-btn-new");
                        otp_verified.value = "ok";
                    }
                    else
                    {   
                        document.getElementById("otpError").innerText = "Invalid OTP";
                    }
                }
            });
        }

    }
    
    let userId = "";

    const PK_API_CLIENT_ID = 'd5d9461b-49f7-4339-8a1b-72cf9fa7b4ee';
    $(document).ready(function () 
    {
        //Location search start 
        function loadScript(cb) {
            var script = document.createElement('script');
            script.src = 'js/location.min.js';
            script.onload = cb;
            script.async = 1;
            document.head.appendChild(script);
        }

        function createInput(id, name, value) {
            const input = document.createElement('input');
            input.name = name;
            //input.id = id;
            input.type = 'hidden';

            return input;
        }
        function initWidget(input) {
            const form = input.form;
            const inputPrefix = input.dataset.location_input_prefix ? input.dataset.location_input_prefix : '';
            const coordinates = createInput("coordinates", inputPrefix + 'coordinates');
            const timezone = createInput("timezone", inputPrefix + 'timezone');
            form.appendChild(coordinates);
            form.appendChild(timezone);
            //alert('Hi');
            new LocationSearch(input, function (data) {
                coordinates.value = `${data.latitude},${data.longitude}`;
                timezone.value = data.timezone;
                input.setCustomValidity('');
            }, { clientId: PK_API_CLIENT_ID, persistKey: `${inputPrefix}loc` });

            input.addEventListener('change', function (e) {
                //alert('Hi');
                input.setCustomValidity('Please select a location from the suggestions list');
            });

            window.onload = function () {
                localStorage.removeItem(`prokerala-location-${inputPrefix}loc`)
            };
            
        }
        loadScript(function () {
            let location = document.querySelectorAll('.prokerala-location-input');
            //console.log(location);
            
            Array.from(location).map(initWidget);
            $('.prokerala-location-input').val('');
        });

        if(userId != "")
        {
            $("#socialLoginDiv").hide();
            $("#loginDiv").hide();
            $("#signupDiv").hide();
            $("#horoscopeDiv").show();
        }
        else
        {
            $("#socialLoginDiv").hide();
            $("#loginDiv").hide();
            $("#signupDiv").hide();
            $("#horoscopeDiv").show();
        }

        clearPersistedInputs();
    });    

    function showSingnup()
    {
        $("#socialLoginDiv").hide();
        $("#loginDiv").hide();
        $("#signupDiv").show();
    }

    function showCoupleSolution(status)
    {
        //console.log("showcouplesolution function called " + status);
        if(status == 1)
        {            
            $("#couplesolution").show();
            $("#newalliancematch").hide();
        }
        else
        {
            $("#couplesolution").hide();
            $("#newalliancematch").show();
        }
    }

    function validateEmailAndPassword()
    {
      document.getElementById('loginEmailError').innerText = "";
      document.getElementById('loginPasswordError').innerText = "";     
      
      let loginSuccess = "You are logged in successfully !";
      let isSingupValid = true;

      // Validate email
      let email = document.getElementById("loginemail");
      if (email.value.trim() === "") {
            document.getElementById('loginEmailError').innerText = "Please enter email address";
            isSingupValid = false;
      } else {
            document.getElementById('loginEmailError').innerText = "";
      }

      // Validate password
      let password = document.getElementById("loginpassword");
      if (password.value.trim() === "") {
            document.getElementById('loginPasswordError').innerText = "Please enter password";
            isSingupValid = false;
      } else {
            document.getElementById('loginPasswordError').innerText = "";
      }

      if(isSingupValid){
       $.ajax({
            url: 'loginMaster.php',
            type: 'POST', 
            dataType: 'text',
            data: "validateLogin=Y&validateSignup=N&email=" + email.value + "&password=" + password.value,
            success: function (data) {
                //alert(data);
                //console.log(data);                
                if(data == "login success")
                {
                    displaySuccessToaster(loginSuccess);
                    window.location.hash = "compalibility-check";
                    window.location.reload();                    
                }
                else
                {
                    displayErrorToaster(data);
                }
            }
        }); 
      }
    }
    
   function validateFullName() {
    var fullNameInput = document.getElementById("fullname");
    var fullNameValue = fullNameInput.value;

    // Regular expression to allow only letters and spaces
    var regex = /^[A-Za-z\s]+$/;

    if (!regex.test(fullNameValue)) {
        alert("Full name should not contain numbers or special characters.");
        fullNameInput.value = ""; // Clear the input
    }
}

    function validateSignUp() {        
        let valid = true;

        let registerSuccess = "Registration completed successfully !";

        // Clear previous error messages
        document.getElementById('nameError').innerText = '';
        document.getElementById('emailError').innerText = ''
        document.getElementById('mobileError').innerText = '';
        document.getElementById('passwordError').innerText = '';;
        document.getElementById('genderError').innerText = '';
        document.getElementById('userlevelError').innerText = '';

        // Full name validation
        const fullName = document.querySelector("input[name='fullname']");
        const nameError = document.getElementById('nameError');
        if (fullName.value.trim() === "") {
            //alert("Please enter your full name.");
            nameError.innerText = 'Please enter full name';
            fullName.focus();
            valid = false;
        }

        //Mobile validation
        const mobileInput = document.getElementById('mobile');
        const mobileError = document.getElementById('mobileError');
        if (mobileInput.value.trim() === "") {
            mobileError.innerText = 'Please enter mobile number';
            mobileInput.focus();
            valid = false;
        }

        // Email validation
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (emailInput.value.trim() === "") {
            emailError.innerText = 'Please enter email address';
            emailInput.focus();
            valid = false;
        } else if (!emailPattern.test(emailInput.value)) {
            emailError.innerText = 'Please enter a valid email address';
            emailInput.focus();
            valid = false;
        }

        // Gender validation
        let gender = document.querySelector('input[name="usergender"]:checked');
        const genderError = document.getElementById('genderError');
        if (!gender) {
            genderError.innerText = "Please select gender";
            valid = false;
        }

        let userlevel = document.querySelector('input[name="userlevel"]:checked');
        const userlevelError = document.getElementById('userlevelError');
        if (!userlevel) {
            userlevelError.innerText = "Please select user type";
            valid = false;
        }

        // Password validation
        const passwordInput = document.getElementById('password');
        const passwordError = document.getElementById('passwordError');
        if (passwordInput.value.trim() === "") {
            //alert("Please enter your password.");
            passwordError.innerText = "Please enter password";
            passwordInput.focus();
            valid = false;
        }

        const otp = document.getElementById('otp');
        const otpValid = document.getElementById('valid_otp');
        const otpError = document.getElementById('otpError');
        if(otp && otpValid.value != "ok")
        {   
            otpError.innerText = "Please enter OTP sent to your mobile";
            valid = false;
        }

        const input = document.querySelector('#mobile');
        const iti = intlTelInput.getInstance(input);
        const countryData = iti.getSelectedCountryData();
        var isdCode = countryData.dialCode;

        if(valid)
        {
            $.ajax({
                url: 'loginMaster.php',
                type: 'POST', 
                dataType: 'text',
                data: "validateLogin=N&validateSignup=Y&email=" + emailInput.value + "&password=" + passwordInput.value + "&fullname=" + fullName.value + "&mobile=" + mobileInput.value + "&gender=" + gender.value + "&userlevel=" + userlevel.value + "&isdCode=" + isdCode,
                success: function (data) {                                
                    //alert(data);
                    //console.log(data);
                    if(data == "registration success")
                    {
                        displaySuccessToaster(registersuccess);
                        window.Location.href = "index.php#compalibility-check";
                        window.location.reload();
                    }
                    else
                    {
                        displayErrorToaster(data);
                    }
                }
            });
        }
        else
        {
            event.preventDefault(); // Prevent form submission
        }
   }

    function viewLoginPassword() 
    {
        var currentPassword = document.getElementById("loginpassword");

        if (currentPassword.type === "password") {
            currentPassword.type = "text";
            $(".open_eye_current").hide();
            $(".close_eye_current").show();
        } else {
            currentPassword.type = "password";
            $(".open_eye_current").show();
            $(".close_eye_current").hide();
        }
    }
    
    function showTooltip(id, event) {
        event.preventDefault();
        event.stopPropagation();

        let modal = document.getElementById("modalTooltip");
        let lblTooltip = document.getElementById("lblTooltip");

        if (!modal || !lblTooltip) {
            console.error("Modal or Tooltip label not found!");
            return;
        }

        let icon = event.currentTarget;
        let iconRect = icon.getBoundingClientRect();

        // Set tooltip text
        switch (id) {
            case 1:
                lblTooltip.innerText = "The 10-match compatibility (Dasama Porutham) in marriage compatibility is a traditional practice in South India. It evaluates the personalities, life goals, and family unity of both individuals based on their horoscopes to predict the success of married life.";
                document.getElementById("lnkmeaning").href="tooltip.php#1";
                break;
            case 2:
                lblTooltip.innerText = "The 36-guna compatibility is an accurate method for horoscope matching in marriage. It is a part of the Ashtakoota matching system, where compatibility is evaluated based on a total of 36 points. It assesses physical, mental, emotional, and spiritual harmony and is commonly used in North India.";
                document.getElementById("lnkmeaning").href="tooltip.php#2";
                break;
            case 3:
                lblTooltip.innerText = "In Vedic astrology, the nine planets (Navagrahas) – Sun, Moon, Mars, Mercury, Jupiter, Venus, Saturn, Rahu, and Ketu – determine significant life events. In marriage compatibility, analyzing how these planets influence the relationship in both individuals' horoscopes is crucial.";
                document.getElementById("lnkmeaning").href="tooltip.php#3";
                break;    
            case 4:
                lblTooltip.innerText = "Astrological remedies are solutions based on Vedic astrology to address specific issues. Performing remedies for doshas (flaws) in the horoscope helps prevent difficulties in life.";
                document.getElementById("lnkmeaning").href="tooltip.php#4";
                break;
            case 5:
                lblTooltip.innerText = "Astro Music Healing Therapy is a unique astrological remedy that uses musical mantras to balance planetary influences and heal emotional distress. By chanting planetary mantras in specific ragas, this practice helps reduce astrological obstacles and fosters clarity and positivity in the marital journey.";
                document.getElementById("lnkmeaning").href="tooltip.php#5";
                break;
            case 6:
                lblTooltip.innerText = "Psychological guidance refers to counseling or advice based on psychological principles. It provides insights and guidance on mental states, emotions, and psychological aspects to help individuals navigate challenges effectively.";
                document.getElementById("lnkmeaning").href="tooltip.php#6";
                break;
            case 7:
                lblTooltip.innerText = "Each zodiac house represents a key aspect of a man’s life, from personality to career, marriage, and wealth. This type of marriage compatibility study assesses how these 12 life aspects match the horoscope of the prospective partner.";
                document.getElementById("lnkmeaning").href="tooltip.php#7";
                break;
            case 8:
                lblTooltip.innerText = "For women, compatibility analysis based on 12 zodiac houses reveals how different aspects of life, such as emotions, career, and relationships, align with a partner’s chart. This ensures a well-balanced and prosperous union.";
                document.getElementById("lnkmeaning").href="tooltip.php#8";
                break;
            case 9:
                lblTooltip.innerText = "The 10-match compatibility (Dasama Porutham) in marriage compatibility is a traditional practice in South India. It evaluates the personalities, life goals, and family unity of both individuals based on their horoscopes to predict the success of married life.";
                document.getElementById("lnkmeaning").href="tooltip.php#9";
                break;
            case 10:
                lblTooltip.innerText = "If Rahu and Ketu are positioned in the 1st, 2nd, 7th, or 8th houses in the horoscope, it can cause delays in marriage. This is known as Sarpa Dosha or Rahu-Ketu Dosha. This condition can affect relationships, mental peace, and family life. To balance this, marrying someone with the same dosha is recommended.";
                document.getElementById("lnkmeaning").href="tooltip.php#10";
                break;
            case 11:
                lblTooltip.innerText = "Kala Sarpa Dosha occurs when all planets, including the ascendant (Lagna), are positioned between Rahu and Ketu in the horoscope.";
                document.getElementById("lnkmeaning").href="tooltip.php#11";
                break;
            case 12:
                lblTooltip.innerText = "When Venus (Shukra) is placed in an unfavorable house, it is known as Kalathira Dosha. This can cause delays and difficulties in marriage. Marrying at a later age can reduce its effects.";
                document.getElementById("lnkmeaning").href="tooltip.php#12";
                break;
            case 13:
                lblTooltip.innerText = "Thara refers to the favorable and unfavorable effects of the 27 nakshatras (stars). Each nakshatra has nine types of Taras, including Janma Tara, Sampat Tara, and Vipat Tara. This compatibility ensures that partners do not bring negative influences to each other.";
                document.getElementById("lnkmeaning").href="tooltip.php#13";
                break;
            case 14:
                lblTooltip.innerText = "In today's fast-paced life, everyone is under stress. If left unmanaged, excessive mental strain can develop, which is indicated by planetary influences. Maintaining mental relaxation is essential. Since mental balance is important in marriage, compatibility is assessed based on Manasanchala Dosha.";
                document.getElementById("lnkmeaning").href="tooltip.php#14";
                break;
            case 15:
                lblTooltip.innerText = "Numerology is the study of numbers and their impact on human life. In marriage compatibility, numerology evaluates the birth number, destiny number, and life path number based on the date of birth to determine the couple’s compatibility.";
                document.getElementById("lnkmeaning").href="tooltip.php#15";
                break;
            case 16:
                lblTooltip.innerText = "Dasa Sandhi is the transition period between the end of one Mahadasha (major planetary period) and the beginning of another. Each Mahadasha affects different aspects of life, such as happiness, career, relationships, and spirituality. This transition phase is called Dasa Sandhi.";
                document.getElementById("lnkmeaning").href="tooltip.php#16";
                break;
            case 17:
                lblTooltip.innerText = "Dasa and Bukti (sub-periods) indicate how planetary periods shape a man’s life, influencing career, marriage, wealth, and health. These periods determine life’s highs and lows with precision.";
                document.getElementById("lnkmeaning").href="tooltip.php#17";
                break;
            case 18:
                lblTooltip.innerText = "A woman’s Dasa and Bukti periods determine significant life phases, such as marriage, childbirth, and career growth. These planetary periods reveal life’s opportunities and challenges.";
                document.getElementById("lnkmeaning").href="tooltip.php#18";
                break;
            case 19:
                lblTooltip.innerText = "This section provides detailed calculations to help astrologers analyze a male horoscope. It covers planetary strengths, special positions, and key influences that shape a person’s life.";
                document.getElementById("lnkmeaning").href="tooltip.php#19";
                break;
            case 20:
                lblTooltip.innerText = "This section provides a detailed astrological breakdown for a female horoscope. It helps astrologers understand planetary positions, strengths, and their effects on different aspects of life.";
                document.getElementById("lnkmeaning").href="tooltip.php#20";
                break;
            default:
                lblTooltip.innerText = "The 10-match compatibility (Dasama Porutham) in marriage compatibility is a traditional practice in South India. It evaluates the personalities, life goals, and family unity of both individuals based on their horoscopes to predict the success of married life.";
                break;
        }

        // Calculate tooltip position
        let tooltipWidth = modal.offsetWidth;
        let tooltipHeight = modal.offsetHeight;
        let screenWidth = window.innerWidth;
        let screenHeight = window.innerHeight;

        let leftPos = iconRect.left + window.scrollX;
        let topPos = iconRect.bottom + window.scrollY;

        // Prevent tooltip from overflowing right edge
        /*if (leftPos + tooltipWidth > screenWidth) {
            leftPos = screenWidth - tooltipWidth - 10; // Add some margin
            modal.style.left = leftPos + "px";
        }
        else
        {
            modal.style.left = "20%";
        }*/
        if (/Mobi|Android/i.test(navigator.userAgent)) {
            modal.style.left = "20%";
            modal.style.top = "10%";
            
        }
        else
        {
            // Prevent tooltip from overflowing right edge
            if (leftPos + tooltipWidth > screenWidth) {
                leftPos = screenWidth - tooltipWidth - 10; // Add some margin
                modal.style.left = leftPos + "px";
            }
        }

        // Prevent tooltip from overflowing bottom edge
        if (topPos + tooltipHeight > screenHeight) {
            topPos = iconRect.top - tooltipHeight - 10; // Show above the icon
        }

        modal.style.position = "fixed";
//        modal.style.top = topPos + "px";
        modal.style.top =  "30%";
        modal.style.zIndex = "1000";
        modal.style.display = "block";

        //console.log(`Tooltip Position - Top: ${modal.style.top}, Left: ${modal.style.left}`);

        // Hide tooltip when clicking outside
        document.addEventListener("click", function hideModal(e) {
            if (!modal.contains(e.target) && e.target !== icon) {
                modal.style.display = "none";
                document.removeEventListener("click", hideModal);
            }
        });
    }

    function displaySuccessToaster(successMessage) {
        toastr.options.timeOut = 1500; // 1.5s 
        toastr.success(successMessage);
    }

    function displayErrorToaster(errorMessage) {
        toastr.options.timeOut = 1500; // 1.5s 
        toastr.error(errorMessage);
    }

    function scrollToSection() {
        document.getElementById("compatibility-check").scrollIntoView({ 
            behavior: "smooth" 
        });
    }
function isNumberCheck(event) {
    let charCode = event.which ? event.which : event.keyCode;
    if (charCode < 48 || charCode > 57) {
        event.preventDefault(); // Prevent non-numeric input
    }
}

function validateMobileNumber(inputSelector) {
    const mobileNumber = $(inputSelector).val().trim();
    const regex = /^(?:\+91|0)?\s*[6-9]\d{4}\s*\d{5}$/; 


    if (!regex.test(mobileNumber)) {
      $(inputSelector+"error").text("Please enter a valid 10-digit mobile number.");
      return false;
    }
    $(inputSelector+"error").text(" ");
    return true;
  }

function showMobile()
{
    $("#sendotp").show();
    $("#verifyotp").hide();
    $("#mobile").attr("readonly", false);
}

const fieldsToPersist = [
    "fullname1", "fullname2", 
    "male-date", "male-month", "male-year",
    "female-date", "female-month", "female-year",
    "male-hour", "male-minute", "ampm1",
    "female-hour", "female-minute", "ampm2",
    "location1", "location2", "partner_email"
];
const locationprase_names = [
    "maleplace","femaleplace",
    "malecoordinates", "femalecoordinates",
    "maletimezone", "femaletimezone"
];

function setUpInputPersistence() {
    try {
        fieldsToPersist.forEach(id => {
            const el = document.getElementsByName(id)[0];
            if (el) {
                // Load value on page load
                const saved = localStorage.getItem(id);
                if (saved !== null) el.value = saved;
            }
        });
    } catch (error) {
        console.log(error);
    }
}

function addtoStorage() {
    fieldsToPersist.forEach(id => {
        const el = document.getElementsByName(id)[0];
        if (el) {
           localStorage.setItem(id, el.value);
        }
    });
}

function clearPersistedInputs() {
    fieldsToPersist.forEach(k => localStorage.removeItem(k));

    localStorage.removeItem("prokerala-location-maleloc");
    localStorage.removeItem("prokerala-location-femaleloc");
}

function submitToPHP() {
    // Create form
    const form = document.createElement("form");
    form.method = "POST";
    form.action = "matchhoroscope.php";

    document.getElementById("profiles_form").value = 1;

    // Append fields as hidden inputs
    fieldsToPersist.forEach(key => {
      const input = document.createElement("input");
      input.type = "hidden";
      input.name = key;
      input.value = localStorage.getItem(key) || "--";
      form.appendChild(input);
    });

    const locations = {
        malelocation: JSON.parse(localStorage.getItem("prokerala-location-maleloc")),
        femalelocation: JSON.parse(localStorage.getItem("prokerala-location-femaleloc"))
    };

    for (const [key, loc] of Object.entries(locations)) {
        if (!loc) continue;
        //console.log(`Processing location for ${key}:`, loc);
        
        const prefix = key === "malelocation" ? "male" : "female";

        const coords = document.createElement("input");
        coords.type = "hidden";
        coords.name = `${prefix}coordinates`;
        coords.value = loc.latitude + "," + loc.longitude;
        form.appendChild(coords);

        const place = document.createElement("input");
        place.type = "hidden";
        place.name = `${prefix}place`;
        place.value = `${loc.city}, ${loc.state}, ${loc.country}`;
        form.appendChild(place);

        const timezone = document.createElement("input");
        timezone.type = "hidden";
        timezone.name = `${prefix}timezone`;
        timezone.value = loc.timezone;
        form.appendChild(timezone);
    }

    const input = document.createElement("input");
      input.type = "hidden";
      input.name = "logintype";
      input.value = "sample";
      form.appendChild(input);

    document.body.appendChild(form);
    localStorage.setItem("submittedOnce", "true");
    clearPersistedInputs();
    form.submit();
}

const new_feildsToPersist = [
    "fullname_male", "fullname_female",
    "birth_time_female", "birth_time_male",
    "birth_date_female", "birth_date_male"
];

function submit_new_partner_details() {
    

    let isValid = true;

    /*new_feildsToPersist.forEach(feild => {
        let feildVal = $("#" + feild).val();
        if (feildVal === "" || feildVal === "--") {
            $("#" + feild + "_error").text("This field is required.");
            isValid = false;
        } else {
            $("#" + feild + "_error").text("");
        }
    });*/

    if(isValid){
        /*if(userId === ''){
            $("#new_partner_details_form").hide();
            $("#social_login").show();
            window.scrollTo({ top: 0, behavior: 'smooth' });       
            localStorage.setItem("submit_after_login", 'true');
        }else{
            $("#modalCenter").modal("show");
            submitToPHP().then((result) => {
                clearPersistedInputs();
            });
            return true;
        }*/
        $("#new_partner_details_form").hide();
        $("#social_login").show();
        window.scrollTo({ top: 0, behavior: 'smooth' });       
        localStorage.setItem("submit_after_login", 'true');
        localStorage.setItem("submittedOnce", "true");
        //console.log(localStorage);
    }
    else {
        return false;
    }    
    
}

function date_split(gender, element) {
    
    let date = $("#birth_date_"+gender).val();
    let dateParts = date.split("-");
    //console.log("Birth date : " + date);
   
    if (dateParts.length == 3) {
        let day = dateParts[2].padStart(2, '0');
        let month = dateParts[1].padStart(2, '0');
        let year = dateParts[0];

        localStorage.setItem(`${gender}-date`, day);
        localStorage.setItem(`${gender}-month`, month);
        localStorage.setItem(`${gender}-year`, year);
    }
}

function time_split(gender, element) {
    
    let time = $("#birth_time_"+gender).val();
    let timeParts = time.split(":");
    if (timeParts.length === 2) {
        var hour = timeParts[0].padStart(2, '0');
        var minute = timeParts[1].padStart(2, '0');
        localStorage.setItem(`${gender}-hour`, hour);
        localStorage.setItem(`${gender}-minute`, minute);
    }
    let ampm = "AM";
    if (hour >= 12) {
        ampm = "PM";
        if (hour > 12) {
            hour = hour - 12; // Convert to 12-hour format
        }
    } else if (hour === 0) {
        hour = 12; // Midnight case
    }

    if (gender === "male") {
        localStorage.setItem("ampm1", ampm);
    } else {
        localStorage.setItem("ampm2", ampm);
    }
}

setUpInputPersistence();
setTimeout(() => {
    if (localStorage.getItem("submit_after_login") === "true" && userId != "") {
        localStorage.removeItem("submit_after_login");
        $("#modalCenter").modal("show");
        submitToPHP();
    }
}, 1000);

function setBirthDate(gender)
{
    let day = $("#"+gender+"-date").val();
    let month = $("#"+gender+"-month").val();
    let year = $("#"+gender+"-year").val();

    localStorage.setItem(`${gender}-date`, day);
    localStorage.setItem(`${gender}-month`, month);
    localStorage.setItem(`${gender}-year`, year);
}

function setBirthTime(gender)
{
    let hour = $("#"+gender+"-hour").val();
    let minute = $("#"+gender+"-minute").val();
    
    localStorage.setItem(`${gender}-hour`, hour);
    localStorage.setItem(`${gender}-minute`, minute);

    /*let ampm = "AM";
    if (hour >= 12) {
        ampm = "PM";
        if (hour > 12) {
            hour = hour - 12; // Convert to 12-hour format
        }
    } else*/ 
    
    if (hour === 0) {
        hour = 12; // Midnight case
    }

    if (gender === "male") {
        localStorage.setItem("ampm1", $("#ampm1").val());
    } else {
        localStorage.setItem("ampm2", $("#ampm2").val());
    }
}
</script>
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
<!--footer section start-->
<footer class="footer-section">
    <!--footer top start-->
    <!--for light footer add .footer-light class and for dark footer add .bg-dark .text-white class-->
    <div class="footer-top ptb-60">
        <div class="container">
            <div class="row justify-content-between pt-4">
                <div class="col-md-8 col-lg-4 mb-md-4 mb-lg-0">
                    <div class="footer-single-col">
                        <div class="footer-single-col mb-4">
                            <img src="assets/img/logo-footer.png" alt="logo" class="img-fluid logo-white">
                        </div>

                    </div>
                </div>
                <div class="col-md-12 col-lg-8 mt-4 mt-md-0 mt-lg-0">
                    <div class="row">

                        <div class="col-md-6 col-lg-6 mt-4 mt-md-0 mt-lg-0 text-right">
                            <div class="footer-single-col">
                                <h3>Contact Us :</h3>
                                <ul class="list-unstyled footer-nav-list mb-lg-0">
                                    <li class="ft-ct-li"><img src="assets/img/whatsapp.svg" alt="Whatsapp" /> <span
                                            class="ftr-ct">+(91) - 9962022209</span></li>
                                    <li class="ft-ct-li"><img src="assets/img/mail.svg" alt="Mail" /> <span
                                            class="ftr-ct">wonderful.couples@astromatch.online</span></li>
                                    <li class="ft-ct-li"><img src="assets/img/call.svg" alt="Call" /> <span
                                            class="ftr-ct">044 - 46972104</span></li>
                                </ul>
                            </div>
                        </div>
                        <!--<div class="col-md-6 col-lg-6 mt-4 mt-md-0 mt-lg-0 text-right">
                                    <div class="footer-single-col">
                                        <h3>Follow us on :</h3>
                                        <div class="">
                                            <a href="javascript:void(0)" class="text-decoration-none soc-py"><img src="assets/img/insta.svg" alt="Instagram" /> </a>
                                            <a href="javascript:void(0)" class="text-decoration-none soc-py"><img src="assets/img/facebook.svg" alt="Facebook" /> </a>
                                            <a href="javascript:void(0)" class="text-decoration-none soc-py"><img src="assets/img/Youtube.svg" alt="Youtube" /> </a>
                                        </div>                                           
                                    </div>
                                </div>-->
                        <div class="col-md-4 col-lg-4 mt-4 mt-md-0 mt-lg-0">
                            <div class="footer-single-col">
                                <div class="cms-section mt-3">
                                    <ul class="cms-links">
                                        <li><a href="contactus.php" title="Contact Us">Contact Us</a></li>
                                        <li><a href="cancelpolicy.php" title="Refund Policy">Refund Policy</a></li>
                                        <li><a href="termsofuse.php" title="Terms of Use">Terms of Use</a></li>
                                        <li><a href="privacypolicy.php" title="Privacy Policy">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="faq.php" class="btn btn-mat btn-sm mt-2"><img class="mr-1 px-2"
                                    src="assets/img/Faq.svg" alt="FAQ" /> FAQ</a>
                            <a href="https://drive.google.com/file/d/1U8j6etOcRhlkR6oL1Ekdbjg9NB2lNsv4/view?usp=sharing"
                                target="_blank" class="btn btn-outline-mat btn-sm mt-2"
                                style="font-size:15px; padding:12px"><img src="assets/img/Group.svg" class="user-guide"
                                    alt="User Guide" />User Guide</a>
                            <a href="#feedbackModal" data-bs-toggle="modal" class="btn btn-outline-mat btn-sm mt-2"><img
                                    class="px-2" src="assets/img/Feedback.svg" alt="Feedback" />Send Feedback</a>
                            <div class="socialmedia-icons-footer mt-2 d-none">
                                <a href="javascript:void(0)" title="Instagram" class="text-decoration-none soc-py"><img
                                        src="assets/img/insta.svg" alt="Instagram" /> </a>
                                <a href="javascript:void(0)" title="Facebook" class="text-decoration-none soc-py"><img
                                        src="assets/img/facebook.svg" alt="Facebook" /> </a>
                                <a href="javascript:void(0)" title="Youtube" class="text-decoration-none soc-py"><img
                                        src="assets/img/Youtube.svg" alt="Youtube" /> </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--footer top end-->

    <!--footer bottom start-->
    <div class="footer-bottom py-4">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="copyright-text">
                        <p>Copyright © 2025 VEALES Vedic Decisions Private Limited</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="copyright-text">
                        <p class="mb-lg-0 mb-md-0">Build Number: 25Q1R1.Sprint-1-QA.MAT-V1_0.250416.1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer bottom end-->
</footer>
<!--footer section end-->
<!--footer section end-->
</div>

<!--build:js-->
<script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
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
</body>

</html>
@endsection