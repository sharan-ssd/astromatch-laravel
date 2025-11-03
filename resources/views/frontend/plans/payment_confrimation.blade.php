@extends('frontend.template')

@section('content')

<div class="m-5">
    <div class="bg-primary">Your Payment is successfull</div>
    {{$status}}
    
    @if($status == 'error'){
        {{$message}}
    }
    @endif
</div>


@endsection

