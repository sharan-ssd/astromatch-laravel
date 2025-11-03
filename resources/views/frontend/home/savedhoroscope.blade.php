@extends('frontend.template')

@section('content')
<style>
    body {
        font-family: 'Latha', sans-serif;
        background-color: #fff;
    }
    .profile-container {
        text-align: center;
        margin-top: 40px;
    }
    .profiles-box {
        border: 2px solid #007bff;
        border-radius: 10px;
        height: 350px;
        overflow-y: auto;
        padding: 15px;
        background: #fff;
    }
    .profiles-box::-webkit-scrollbar {
        width: 6px;
    }
    .profiles-box::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 3px;
    }
    .profile-item {
        text-align: left;
        margin-bottom: 10px;
        padding: 6px 10px;
        border-radius: 6px;
        transition: 0.3s;
    }
    .profile-item:hover {
        background-color: #f8f9fa;
    }
    .heading {
        font-size: 26px;
        color: #d63384;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .submit-btn {
        background-color: #d63384;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 25px;
        font-size: 16px;
        margin-top: 20px;
    }
    .submit-btn:hover {
        background-color: #c2185b;
    }
</style>
<div class="container profile-container">
    <h3 class="mb-4" style="color:#d63384; font-weight:bold;">{{__('messages.savedprofile')}}</h3>

    <form action="" method="POST">
        @csrf
        <div class="row justify-content-center">
            <!-- Male Profiles -->
            <div class="col-md-5">
                <div class="heading">{{__('messages.malehoroscope')}}</div>
                <div class="profiles-box">
                    @foreach ($maleProfiles as $male)
                        <div class="radio-group common-radio-btns">
                            <input class="form-check-input" type="radio" name="male_profile" 
                                   id="male{{ $male->astroProfileID }}" value="{{ $male->astroProfileID }}" required>
                            <label class="form-check-label" for="male{{ $male->astroProfileID }}">
                                <strong>{{ strtoupper($male->astroProfileName) }}</strong><br>
                                {{ \Carbon\Carbon::parse($male->dateOfBirth)->format('d/m/Y') }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Female Profiles -->
            <div class="col-md-5">
                <div class="heading">{{__('messages.femalehoroscope')}}</div>
                <div class="profiles-box">
                    @foreach ($femaleProfiles as $female)
                        <div class="radio-group common-radio-btns">
                            <input class="form-check-input" type="radio" name="female_profile" 
                                   id="female{{ $female->astroProfileID }}" value="{{ $female->astroProfileID }}" required>
                            <label class="form-check-label" for="female{{ $female->astroProfileID }}">
                                <strong>{{ strtoupper($female->astroProfileName) }}</strong><br>
                                {{ \Carbon\Carbon::parse($female->dateOfBirth)->format('d/m/Y') }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-6" style="text-align:right;padding-right:0;">
                <button type="submit" class="btn btn-mat">{{__('messages.submit')}}</button>
            </div>
        </div>
    </form>
</div>@endsection
