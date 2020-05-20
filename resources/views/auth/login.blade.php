@extends('layouts.auth')

@section('content')

<div class="main-container">
    <section class="imageblock switchable feature-large height-100 section--ken-burns bg--secondary">
        <div class="imageblock__content col-lg-6 col-md-4 pos-right">
            <div class="background-image-holder section--ken-burns" data-overlay="3"> <img alt="image" src="{{ url('beforeLogin/img/sanmiguel-1.jpg')}}">
            </div> 
        </div>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-lg-5 col-md-7 card-1">
                    <hr data-title="Are you an Employee? Login here" style="border: 1px solid #0078ff;">
                    <form method="POST" action="{{ route('login') }}">
                     @csrf
                        <div class="row">

                            <div class="col-12"> 
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"placeholder="Email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>

                            <div class="col-12"> 
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12"> 
                                <button type="submit" class="btn btn--primary type--uppercase">{{ __('Login') }}</button> 
                            </div>

                            <!-- <div class="col-12"> 
                                <span class="type--fine-print block">Forgot your username or password? <a href="{{ route('password.request') }}">Recover account</a></span>
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
