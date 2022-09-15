@extends('frontend.layouts.master')

@section('content')



<section class="account-page-area section-gap-equal">
    <div class="container position-relative">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-5">
                <div class="login-form-box">
                    <h3 class="title">Se connecter</h3>
                    <form action="{{route('seller.login')}}" method="POST" >
                        @csrf

                        @if (session()->has('errorpass'))
                        <span class="text-danger mb-3">{{session()->get('errorpass')}}</span>
                        @endif

                        <div class="form-group">
                            <label for="current-log-email">Email*</label>
                            <input type="email" name="email" required >
                        </div>
                        <div class="form-group">
                            <label for="current-log-password">Mot de passe*</label>
                            <input type="password" name="password" required>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="edu-btn btn-medium">Se connecter <i class="icon-4"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="login-form-box registration-form">
                    <h3 class="title">S'inscrire</h3>
                    <form action="{{route('seller.register')}}" method="POST"  >
                        @csrf
                        <div class="form-group">
                            <label for="reg-name">Nom & Prénom*</label>
                            @error('full_name')
                                <p class="text-danger">vérifier votre nom et prènom</p>
                            @enderror
                            <input type="text" name="full_name" required value="{{old('full_name')}}" >
                        </div>
                        <div class="form-group">
                            <label for="log-email">Téléphone*</label>
                            @error('phone')
                                <p class="text-danger">Numèro de téléphone doit avoir 8 chiffres</p>
                            @enderror
                            <input type="tel" name="phone" required value="{{old('phone')}}">
                        </div>
                        <div class="form-group">
                            <label for="log-email">Email*</label>
                            @error('email')
                            <p class="text-danger">Email déja utilisé</p>
                            @enderror
                            <input type="email" name="email" required value="{{old('email')}}" >
                        </div>
                        <div class="form-group">
                            <label for="log-password">Mot de passe*</label>
                            @error('password')
                                <p class="text-danger">Mot de passe doit avoir au minimum 4 caractères</p>
                            @enderror
                            <input type="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="edu-btn btn-medium">S'inscrire <i class="icon-4"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1 scene"><img data-depth="2" src="{{asset('frontend/assets/images/about/shape-07.png')}}" alt="Shape"></li>
            <li class="shape-2 scene"><img data-depth="-2" src="{{asset('frontend/assets/images/about/shape-13.png')}}" alt="Shape"></li>
            <li class="shape-3 scene"><img data-depth="2" src="{{asset('frontend/assets/images/about/shape-02.png')}}" alt="Shape"></li>
        </ul>
    </div>
</section>

@endsection

@section('scripts')


@if (session()->has('success'))
<script>
    $(document).ready(function(){
        alertify.set('notifier','position','bottom-right');
        alertify.success('{{session()->get('success')}}');
    })
</script>
@endif


@endsection
