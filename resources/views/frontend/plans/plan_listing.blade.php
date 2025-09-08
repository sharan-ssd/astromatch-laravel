@extends('frontend.template')

@section('content')

<div class="">
    
    {{-- todo --}}
    <button onclick="startPayment()">Pay Now</button>

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
                            <h2><small>₹</small>99 <span class="strikethrough">₹199</span><span> <span> + GST</span></span>
                            </h2>
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
                            <h2><small>₹</small>199 <span class="strikethrough">₹399</span><span> <span> + GST</span></span>
                            </h2>
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
    async function startPayment() {
        let response = await fetch("/payment/create-order", {
            method: "POST",
            headers: { "Content-Type": "application/json" , "X-CSRF-TOKEN": "{{ csrf_token() }}"},
            body: JSON.stringify({ amount: 500 })
        });
        let data = await response.json();

        var options = {
            "key": data.key,
            "amount": data.amount,
            "currency": data.currency,
            "order_id": data.orderId,
            "handler": function (response){
                alert("Payment ID: " + response.razorpay_payment_id);
                alert("Order ID: " + response.razorpay_order_id);
                alert("Signature: " + response.razorpay_signature);
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }
</script>

@endsection