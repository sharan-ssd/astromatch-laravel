@extends('frontend.template')
@section('content')
<main class="float-start w-100 body-main">
    <section class="konow-more-zoidc d-inline-block w-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <span style="color:red;"> </span>
                    <div class="form-zodiuc mb-5 mt-5 mt-lg-0">
                        <div class="comon-heading text-center">
                            <h2 class="common-heading mt-3 mb-3"> My Profile </h2>
                        </div>
                        <div class="myprofile-section">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-3">
                                        <img src="{{Auth::user()->profilePicture}}" class="my-profile-img" alt="Profile Image">

                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><i class="fa fa-user"></i> Full Name {{Auth::user()->userName}}</label>
                                            </div>
                                            <div class="col-md-8 profile-value">
                                                <span>{{Auth::user()->userName}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><i class="fa fa-phone"></i> Mobile Number </label>
                                            </div>
                                            <div class="col-md-8 profile-value">
                                                <span>{{Auth::user()->mobileNumber}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><i class="fab fa-whatsapp" aria-hidden="true"></i> WhatsApp
                                                    Number </label>
                                            </div>
                                            <div class="col-md-8 profile-value">
                                                <span>{{Auth::user()->whatsAppNumber}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><i class="fa fa-envelope"></i> Email </label>
                                            </div>
                                            <div class="col-md-8 profile-value">
                                                <span>{{Auth::user()->email}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><i class="fa fa-neuter"></i> Gender </label>
                                            </div>
                                            <div class="col-md-8 profile-value">
                                                <span>{{Auth::user()->gender}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><i class="fa fa-users"></i> User Type </label>
                                            </div>
                                            <div class="col-md-8 profile-value">
                                                <span>{{Auth::user()->userType}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="assets/img/myprofileimg.jpg" class="login-image" alt="Profile Image">
                </div>
            </div>
        </div>
    </section>
</main>

</div>


@endsection