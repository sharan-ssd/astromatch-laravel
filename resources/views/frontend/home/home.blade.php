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

            <form method="post" onsubmit="validateHorosope(event);" action="/submit-horoscope">
                @csrf
                <div class="form-group">
                    <label class="form-label">Your's Fullname <span style='color:#e91e63; font-weight:bold;'>(Male
                            Horoscope)</span></label>
                    <input type="text" id="fullname_male" name="fullname_male" class="form-control"
                        placeholder="Full Name" validations="required:true;length:5">
                </div>

                <div class="form-group">
                    <label class="form-label">Your Date of Birth</label>
                    <div class="row">
                        <div class="col-sm-4 ">
                            <div class="form-control-group mb-3">
                                <select class="form-control form-select" name="male-year" id="male-year"
                                    onchange="updateDays('male')" validations="required:true">
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
                                    onchange="updateDays('male')" validations="required:true">
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
                                    onchange="setBirthDate('male')" validations="required:true">
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
                                <select class="form-control form-select" name="male-hour" id="male-hour"
                                    validations="required:true">
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
                                <select class="form-control form-select" name="male-minute" id="male-minute"
                                    validations="required:true">
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
                                <select class="form-control form-select" name="ampm1" id="ampm1"
                                    validations="required:true" onchange="setBirthTime('male')">
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
                        name="location1" id="location1" placeholder="Place of Birth" autocomplete="off"
                        validations="required:true" />
                    <span class="error" id="location1_error"></span>
                </div>

                <div class="form-group">
                    <label class="form-label">Partner's Fullname <span style='color:#e91e63; font-weight:bold;'>(Female
                            Horoscope)</span></label>
                    <input type="text" id="fullname_female" name="fullname_female" validations="required:true"
                        class="form-control" placeholder="Full Name">
                    <span class="error" id="fullname_female_error"></span>
                </div>


                <div class="form-group">
                    <label class="form-label">Partner's Date of Birth</label>

                    <!-- <input type="date" onchange="date_split('female', this)" id="birth_date_female" class="form-control"> -->

                    <div class="row">
                        <div class="col-sm-4 ">
                            <div class="form-control-group mb-3">
                                <select class="form-control form-select" name="female-year" id="female-year"
                                    onchange="updateDays('female')" validations="required:true">
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
                                    validations="required:true" onchange="updateDays('female')">
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
                                    validations="required:true" onchange="setBirthDate('female')">
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
                                <select class="form-control form-select" name="female-hour" id="female-hour"
                                    validations="required:true">
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
                                <select class="form-control form-select" name="female-minute" id="female-minute"
                                    validations="required:true">
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
                                    validations="required:true" onchange="setBirthTime('female')">
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
                        validations="required:true" name="location2" id="location2" placeholder="Place of Birth"
                        autocomplete="off" />
                    <span class="error" id="location2_error"></span>
                </div>

                <div class="form-group">
                    <label class="form-label">Partner Email</label>
                    <input type="text" id="partner_email" validations="required:true;pattern:email" class="form-control"
                        placeholder="Email">
                    <span class="error" id="email_error"></span>
                </div>
                <button type="submit" class="btn btn-mat  w-100">Check Your
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


<script>
    function setBirthTime(gender)
    {
        let hour = $("#"+gender+"-hour").val();
        let minute = $("#"+gender+"-minute").val();
        
        if (hour === 0) {
            hour = 12; // Midnight case
        }

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

    function validateHorosope(e) {
        clearErrors();

        let parent = $('#new_partner_details_form');
        let inputs = $(parent).find('input, select, textarea');
        let isvalid = true;
        let focusSet = false;

        inputs.each(function() {
            let value = $(this).val();
            let rules = $(this).attr('validations');
            let label = $(this).attr('placeholder');

            let errors = validationMatch(value, rules);

            if (errors.length > 0) {
                addError($(this), errors[0]);
                isvalid = false;

                if(!focusSet){
                    $('html, body').animate({
                        scrollTop: $(this).offset().top - 100,
                    }, 1000);
                }

                focusSet = true;
            }
        });

        if (!isvalid) {
            e.preventDefault();
        }
        
    }

    function addError(currentInput, label) {
        var errorElement = `<span class="error text-red">${label??' Invalid Input'}</span>`
        currentInput.parent().append(errorElement);
    }


    function clearErrors(){
        $('.error').remove();
    }

    const regex_patterns = {
        email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,     
        number: /^[0-9]+$/,                      
        alpha: /^[A-Za-z]+$/,                   
        alphanumeric: /^[A-Za-z0-9]+$/      
    };

    function validationMatch(value, rulesString) {
        if(!rulesString) return [];

        let rules = {};
        

        rulesString.split(";").forEach(rule => {
            if (rule.trim() === "") return;
            let [key, val] = rule.split(":");
            if (key && val) {
                rules[key.trim()] = val.trim();
            }
        });

        let errors = [];

        if (rules.required === "true" && (!value || value.trim() === "")) {
            errors.push("This field is required.");
        }

        if (rules.length && value.length < parseInt(rules.length)) {
            errors.push(`Length must be ${rules.length} characters.`);
        }

        if (rules.pattern && regex_patterns[rules.pattern]) {
            if (!regex_patterns[rules.pattern].test(value)) {
                errors.push(`Invalid ${rules.pattern} format.`);
            }
        }

        return errors;
    }

    
</script>

<script type="module">
    const PK_API_CLIENT_ID = 'd5d9461b-49f7-4339-8a1b-72cf9fa7b4ee';
    
    $(document).ready(function() {

        function loadScript(cb) {
            var script = document.createElement('script');
            script.src = 'js/location.min.js';
            script.onload = cb;
            script.async = 1;
            document.head.appendChild(script);
        }

       function createInput(id, name, value) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.id = id;
            input.name = name;
            input.value = value;

            $('#new_partner_details_form').append(input);

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
            new LocationSearch(input, function(data) {
                coordinates.value = `${data.latitude},${data.longitude}`;
                timezone.value = data.timezone;
                input.setCustomValidity('');
            }, {
                clientId: PK_API_CLIENT_ID,
                persistKey: `${inputPrefix}loc`
            });

            input.addEventListener('change', function(e) {
                input.setCustomValidity('Please select a location from the suggestions list');
            });

            window.onload = function() {
                localStorage.removeItem(`prokerala-location-${inputPrefix}loc`)
            };

        }

        loadScript(function() {
            let location = document.querySelectorAll('.prokerala-location-input');
            Array.from(location).map(initWidget);
            $('.prokerala-location-input').val('');
        });


    });
                
</script>
@endsection