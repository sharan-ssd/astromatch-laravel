@extends('frontend.template')

@section('content')

<div class="m-5">
    <div class="bg-primary">Your Payment is successfull</div>
    {{$status}}
    
    @if($status == 'error'){
        {{$message}}
    }
    @endif

    <button onclick="redirect_to_report()">redirect me to report</button>
</div>

<script>
    var astro_match = @json($astro_match)[0];
    function redirect_to_report(){
        var redirectUrl = `/${report_type}?mainProfileId=${astro_match.mainProfileID}&allianceProfileId=${astro_match.allianceProfileID}&decisionID1=${astro_match.firstDecisionID}&decisionID2=${astro_match.secondDecisionID}&matchMethod=${astro_match.matchMakingMethod}&matchID=${astro_match.sno}&userId=${astro_match.userID}`;
        redirectUrl = `/marriagereportcomplete?mainProfileId=${astro_match.mainProfileID}&allianceProfileId=${astro_match.allianceProfileID}&decisionID1=${astro_match.firstDecisionID}&decisionID2=${astro_match.secondDecisionID}&matchMethod=${astro_match.matchMakingMethod}&matchID=1181&userId=${astro_match.userID}`;
        window.location.href = redirectUrl;
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


@endsection

