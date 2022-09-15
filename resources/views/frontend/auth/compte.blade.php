@extends('frontend.layouts.master')

@section('content')


<section class="checkout-page-area section-gap-equal">
    <div class="container">


        <form action="{{route('seller.compte-update')}}" method="post">
            @csrf


            <div class="checkout-notice">
                <div class="coupn-box">
                    <h6 class="toggle-bar"> Voulez-vous modifier <a>vos cordonnées</a> ? </h6>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-9">
                    <div class="checkout-billing">
                        <h3 class="title">Vos cordonnées</h3>
                        <div class="row g-lg-5">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="firstName">Nom & prènom*</label>
                                    @error('full_name')
                                        <p class="text-danger">vérifier votre nom et prènom</p>
                                    @enderror
                                    <input type="text" name="full_name" value="{{$user->full_name}}" required >
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="emailAddress">Email *</label>
                            @error('email')
                                <p class="text-danger">Vérifier email</p>
                            @enderror
                            <input type="email" name="email" value="{{$user->email}}" required>
                        </div>
                        <div class="row g-lg-5">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="displayName">Numèro de téléphone *</label>
                                    @error('phone')
                                        <p class="text-danger">Numèro de téléphone doit avoir 8 chiffres</p>
                                    @enderror
                                    <input type="tel" required name="phone" value="{{$user->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="currentPass">Mot de passe (Laisser vide pour ne se change pas)</label>
                            <input type="text" name="newpass" placeholder="Laisser vide pour ne se change pas" >
                        </div>

                        <button type="submit" class="edu-btn order-place">Enregistrer Modifications <i class="icon-4"></i></button>
                    </div>

                </div>

            </div>

        </form>
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
