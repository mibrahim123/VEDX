@extends('layouts.front.guest')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/front/student.css')}}">

    <link rel="stylesheet" href="{{ asset('css/front/signupcompelete.css')}}">
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
                    <div class="vx__login--form" id="multi__step__form">
                                    <App/>


                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.15/js/intlTelInput.min.js" integrity="sha512-L3moecKIMM1UtlzYZdiGlge2+bugLObEFLOFscaltlJ82y0my6mTUugiz6fQiSc5MaS7Ce0idFJzabEAl43XHg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ mix('js/app.js') }}"></script>
@endsection
