@extends('frontend.template')

@section('content')

<div class="">

    <style>
        .ptable-single {
            box-shadow: 5px 5px 10px rgba(147, 147, 147, 0.3);
            border-radius: 5px;
            border: 1px;
        }

        .ptable-single:hover {
            box-shadow: 5px 5px 10px rgba(97, 97, 97, 0.3);
        }

        .payment-card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .plan-option {
            cursor: pointer;
            transition: 0.2s;
        }

        .plan-option:hover {
            background-color: #f1f3f5;
        }

        .coupon-btn {
            border-radius: 0 .5rem .5rem 0;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <div class="card payment-card p-4">
                    <h3 class="text-center mb-4 fw-bold">💳 Payment Checkout</h3>

                    <form onsubmit="startPayment(event);return false;">
                        <!-- Basic Info -->
                        <div class="mb-3">
                            <label class="form-label">Full Name *</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name"
                                required value="{{auth()->user()->userName}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address *</label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Enter your email" required value="{{auth()->user()->email}}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="2"
                                placeholder="Enter your address"></textarea>
                        </div>

                        <!-- Extra Info -->
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="extraInfoToggle" name="extraInfoToggle">
                            <label class="form-check-label fw-semibold" for="extraInfoToggle">
                                Provide Additional Info & Get <span class="text-success">10% Discount</span>
                            </label>
                        </div>

                        <div id="extraInfoFields" class="d-none">
                            <!-- Male -->
                            <h5>Male</h5>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="text" id="maleReligion" class="form-control" placeholder="Religion">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="maleCaste" class="form-control" placeholder="Caste">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="maleOccupation" class="form-control"
                                        placeholder="Occupation">
                                </div>
                            </div>

                            <!-- Female -->
                            <h5>Female</h5>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="text" id="femaleReligion" class="form-control" placeholder="Religion">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="femaleCaste" class="form-control" placeholder="Caste">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id="femaleOccupation" class="form-control"
                                        placeholder="Occupation">
                                </div>
                            </div>
                        </div>

                        <!-- Plan Selection -->
                        <h5 class="mt-4 fw-bold">Choose Your Plan</h5>
                        <div class="list-group mb-3">
                            @foreach ($plans as $plan)
                            <label class="list-group-item plan-option">
                                <input type="radio" class="form-check-input me-2" name="plan" value="{{$plan->price}}"
                                    checked>
                                {{$plan->name}} - ₹{{$plan->price}}
                            </label>
                            @endforeach
                        </div>

                        <!-- Coupon -->
                        <div class="input-group mb-3">
                            <input type="text" id="couponCode" class="form-control" placeholder="Enter coupon code">
                            <button class="btn btn-outline-primary coupon-btn" type="button"
                                id="applyCoupon">Apply</button>
                        </div>

                        <!-- Summary -->
                        <div class="card bg-light p-3 mb-3 rounded-4">
                            <h5 class="fw-bold">Summary</h5>
                            <p class="mb-1">Plan Price: ₹<span id="planPrice">100</span></p>
                            <p class="mb-1 text-success">Discount: -₹<span id="discount">0</span></p>
                            <p class="mb-1 text-primary">Coupon Discount: -₹<span id="couponDiscount">0</span></p>
                            <h5 class="mt-2">Total: ₹<span id="totalPrice">100</span></h5>
                        </div>

                        <button type="submit" class="btn btn-mat w-100 py-2 fw-bold rounded-pill" id="payButton">
                            Proceed to Pay
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>


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
</div>


{{-- payment logics --}}
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    async function startPayment(e) {
        e.preventDefault();

        var totalamount = document.getElementById('totalPrice').innerHTML;
        totalamount = Math.max(totalamount, 2);
        var xavier_report_id = "{{ $xavier_report_id }}";

        let response = await fetch("/payment/create-order", {
            method: "POST",
            headers: { "Content-Type": "application/json" , "X-CSRF-TOKEN": "{{ csrf_token() }}"},
            body: JSON.stringify({ amount: totalamount })
        });
        let data = await response.json();

        var options = {
            "key": data.key,
            "amount": data.amount,
            "currency": data.currency,
            "order_id": data.orderId,
            "handler": function (response) {
                console.log("Payment ID: " + response.razorpay_payment_id);
                console.log("Order ID: " + response.razorpay_order_id);
                console.log("Signature: " + response.razorpay_signature);
                Swal.fire({
                    title: 'Redirecting you to report...',
                    html: 'Verifying your payment.',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading(); // built-in SweetAlert2 loader
                    }
                });
                capturePayment(response, xavier_report_id);
            },
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function (response){
            alert(response.error.reason);
        });
        rzp1.open();
    }

    async function capturePayment(paymentData, xavier_report_id) {
        var totalamount = document.getElementById('totalPrice').innerHTML;
        let response = await fetch("/payment/capture-payment", {
            method: "POST",
            headers: { "Content-Type": "application/json" , "X-CSRF-TOKEN": "{{ csrf_token() }}"},
            body: JSON.stringify({ ...paymentData, xavier_report_id, amount: totalamount })
        });
        
        console.log(response);
        if (response.status == 204) {
            setTimeout(() => {
                capturePayment(paymentData, xavier_report_id);
            }, 5000);
            return;
        }

        let data = await response.json();
        
        if (response.status != 200) {
            Swal.fire({
                icon: 'error',
                title: 'Payment Failed',
                text: data.message || 'There was an issue capturing your payment. Please contact support.',
            });
            return;
        }

        var astro_match = data.astro_match[0];
        var report_type = $('input[name="plan"]:checked').val();

        if(report_type == 'Premimum'){
            report_type = 'marriagereportcomplete';
        }
        else{
            report_type = 'marriagereport';
        }

        var redirectUrl = `/${report_type}?mainProfileId=${astro_match.sno}&allianceProfileId=${astro_match.allianceProfileID}&decisionID1=${astro_match.firstDecisionID}&decisionID2=${astro_match.secondDecisionID}&matchMethod=${astro_match.matchMakingMethod}&matchID=${astro_match.matchID}&userId=${astro_match.userID}`;
        var redirectUrl = `/${report_type}?mainProfileId=${astro_match.mainProfileID}&allianceProfileId=${astro_match.allianceProfileID}&decisionID1=${astro_match.firstDecisionID}&decisionID2=${astro_match.secondDecisionID}&matchMethod=${astro_match.matchMakingMethod}&matchID=${astro_match.sno}&userId=${astro_match.userID}`;
        redirectUrl = `/marriagereportcomplete?mainProfileId=${astro_match.mainProfileID}&allianceProfileId=${astro_match.allianceProfileID}&decisionID1=${astro_match.firstDecisionID}&decisionID2=${astro_match.secondDecisionID}&matchMethod=${astro_match.matchMakingMethod}&matchID=1181&userId=${astro_match.userID}`;
        window.location.href = redirectUrl;
    }

</script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script defer>
    const planRadios = document.querySelectorAll('input[name="plan"]');
  const extraInfoToggle = document.getElementById('extraInfoToggle');
  const extraInfoFields = document.getElementById('extraInfoFields');
  const planPriceEl = document.getElementById('planPrice');
  const discountEl = document.getElementById('discount');
  const couponDiscountEl = document.getElementById('couponDiscount');
  const totalPriceEl = document.getElementById('totalPrice');
  const applyCouponBtn = document.getElementById('applyCoupon');
  const couponCodeInput = document.getElementById('couponCode');

  let couponDiscount = 0;

  function updateSummary() {
    let price = parseInt(document.querySelector('input[name="plan"]:checked').value);
    let discount = extraInfoToggle.checked ? price * 0.1 : 0;
    planPriceEl.textContent = price.toFixed(2);
    discountEl.textContent = discount.toFixed(2);
    couponDiscountEl.textContent = couponDiscount.toFixed(2);
    totalPriceEl.textContent = Math.max((price - discount - couponDiscount), 0).toFixed(2);

    if(totalPriceEl.textContent < 1) {
        document.getElementById('payButton').textContent = 'Get Report for Free';
    } else {
        document.getElementById('payButton').textContent = 'Proceed to Pay';
    }
  }

  planRadios.forEach(r => r.addEventListener('change', updateSummary));
  extraInfoToggle.addEventListener('change', () => {
    extraInfoFields.classList.toggle('d-none', !extraInfoToggle.checked);
    updateSummary();
  });

  applyCouponBtn.addEventListener('click', () => {
    const code = couponCodeInput.value.trim().toUpperCase();
    const price = parseInt(document.querySelector('input[name="plan"]:checked').value);

        const cupon_response = fetch('/api/validate-coupon', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ coupon_code:code , lang: "{{app()->getLocale()}}" , price })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                couponDiscount = Math.min(data.discount_amount, price);
                Swal.fire({
                    icon: 'success',
                    title: 'Coupon Applied',
                    text: `You got ${data.discount_amount} ${data.discount_type == 'percentage' ? '%' : '₹ off'}!`,
                });
            } else {
                couponDiscount = 0;
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Coupon',
                    text: 'The coupon code you entered is invalid.',
                });
            }

            updateSummary();
        });

    
  });


    function attachAutoSuggest(selector, type) {
        $(selector).autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "/api/suggest",
                    data: { q: request.term, type: type,lang: "{{app()->getLocale()}}" },
                    success: function(data) {
                        response(data.map(item => item.word));
                    }
                });

            },
            minLength: 2
        });
    }


    attachAutoSuggest("#maleReligion", "religion");
    attachAutoSuggest("#maleCaste", "caste");
    attachAutoSuggest("#maleOccupation", "occupation");
    attachAutoSuggest("#femaleReligion", "religion");
    attachAutoSuggest("#femaleCaste", "caste");
    attachAutoSuggest("#femaleOccupation", "occupation");

  updateSummary();
</script>


@endsection