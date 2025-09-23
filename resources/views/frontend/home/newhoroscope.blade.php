@extends('frontend.template')   

@section('content') 

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
@endsection