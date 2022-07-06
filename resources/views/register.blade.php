@extends('layouts.front.guest')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/front/signup.css')}}">
@endsection
@section('content')
<main>
    <section class="vx__login">
        <div class="login-container">
            <div class="row align-items-end vx__data--set">
                <div class="col--50">
                    <div class="vx__login--image">
                        <img src="{{ asset('Images/front/register-image.png')}}" alt="Forgot-image">
                    </div>
                </div>
                <div class="col--50">
                    <div class="vx__login--form">
                        <div class="form--data">
                            <h2 class="text-600 text-center mb-50">Register Now</h2>
                            <div class="vx__progress-bar d-flex mb-40">
                                <div class="register-bar progress--bar col--50 active">
                                    <p class="mb-10 text-600">1. Registration Type</p>
                                    <div class="progress-line"></div>
                                </div>
                                <div class="complete-bar progress--bar col--50">
                                    <p class="mb-10 text-600">2. Complete Your Profile</p>
                                    <div class="progress-line"></div>
                                </div>
                            </div>
                            <h5 class="text-center text-600 mb-45">Please select registration type</h5>
                            <div class="vx__user--type">
                                <div class="vx_user--items d-flex justify-content-center">
                                    <a href="{{ route('register.now') }}" class="h3 btn btn-blue secondary-font">Expert</a>
                                    <a href="{{ route('register.now') }}" class="h3 btn btn-blue secondary-font">Learner</a>
                                    <a href="{{ route('register.now') }}" class="h3 btn btn-blue secondary-font">Enterprise</a>
                                </div>
                                <h1>The <span class="secondary-font secondary-color">how</span> app</h1>
                            </div>
                        </div>
                        <p class="vx__account--link text-center">Already have an account? <a href="login.html">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
