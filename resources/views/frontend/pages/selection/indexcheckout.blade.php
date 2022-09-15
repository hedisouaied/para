@extends('frontend.layouts.master')

@section('content')



<div class="breadcrumb-area breadcrumb-area-padding-2 bg-gray-2">
    <div class="custom-container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Accueil</a>
                </li>
                <li class="active">Passer commande</li>
            </ul>
        </div>
    </div>
</div>

<div class="checkout-area pt-75 pb-75">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">


                <div class="billing-info-wrap padding-20-row-col contact-from-area">
                    <form action="{{route('checkout')}}" method="POST" class="contact-form-style" >
                        @csrf

                            <div class="row">

                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info input-style mb-35">
                                            <label>Nom *</label>
                                            <input type="text" required name="nom" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info input-style mb-35">
                                            <label>Prénom *</label>
                                            <input type="text" required name="prenom" >
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info input-style mb-35">
                                            <label>Phone *</label>
                                            <input type="number" required name="phone" >
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="select-style billing-select mb-35">
                                            <label>Gouvernorat *</label>
                                            <select class="select-active" required name="gouvernorat" >
                                                <option value="">Séléctionnez votre gouvernorat</option>
                                                <option value="Ariana">Ariana</option>
                                                <option value="Beja">Beja</option>
                                                <option value="Ben Arous">Ben Arous</option>
                                                <option value="Bizerte">Bizerte</option>
                                                <option value="Jendouba">Jendouba</option>
                                                <option value="Gabes">Gabes</option>
                                                <option value="Gafsa">Gafsa</option>
                                                <option value="Kairouan">Kairouan</option>
                                                <option value="Kasserine">Kasserine</option>
                                                <option value="Kébili">Kébili</option>
                                                <option value="Kef">Kef</option>
                                                <option value="Mahdia">Mahdia</option>
                                                <option value="Manouba">Manouba</option>
                                                <option value="Medenine">Medenine</option>
                                                <option value="Monastir">Monastir</option>
                                                <option value="Nabeul">Nabeul</option>
                                                <option value="Sfax">Sfax</option>
                                                <option value="Sidi Bouzid">Sidi Bouzid</option>
                                                <option value="Siliana">Siliana</option>
                                                <option value="Sousse">Sousse</option>
                                                <option value="Tataouine">Tataouine</option>
                                                <option value="Tozeur">Tozeur</option>
                                                <option value="Tunis">Tunis</option>
                                                <option value="Zaghouan">Zaghouan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="billing-info input-style mb-35">
                                            <label>Ville *</label>
                                            <input class="billing-address" required type="text" name="adresse" >
                                        </div>
                                    </div>
                                    <div class="grand-total-btn">
                                        <button type="submit" >Passer commande</button>
                                    </div>


                            </div>

                    </form>
                </div>
                <div class="payment-details-area">
                    <h4>Information paiement</h4>
                    <div class="payment-method">

                        <div class="sin-payment mb-20">
                            <input id="payment-method-3" class="input-radio" type="radio" value="cheque" name="payment_method">
                            <label for="payment-method-3">
                                <span>
                                <img class="nomal-img" src="{{asset('frontend/assets/images/icon-img/cash-on-delivery.png')}}" alt="">
                                <img class="active-img" src="{{asset('frontend/assets/images/icon-img/cash-on-delivery-active.png')}}" alt="">
                            </span>
                                Cash on delivery
                            </label>
                            <div class="payment-box payment_method_bacs">
                                <p>Payez en espèces à la livraison.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="order-summary">
                    <div class="order-summary-title">
                        <h3>Commande</h3>
                    </div>
                    <div class="order-summary-top">
                        @php $total=0; @endphp

                        @foreach ($cart_data as $data)
                        @php
                            $items_list = \App\Models\Product::find($data['item_id']);
                        @endphp
                            @if ($items_list)

                                @php
                                    $photos = explode(',',$items_list->photo);
                                @endphp
                                <div class="order-summary-img-price">
                                    <div class="order-summary-img-title">
                                        <div class="order-summary-img">
                                            <a href="{{route('product.detail',$items_list->slug)}}"><img src="{{$photos[0]}}" alt=""></a>
                                        </div>
                                        <div class="order-summary-title">
                                            <h4>{{$items_list->title}} <span>× {{$data['item_quantity']}}</span></h4>
                                        </div>
                                    </div>
                                    <div class="order-summary-price">
                                        <span>{{number_format((($items_list->price-(($items_list->discount)*$items_list->price)/100)*$data['item_quantity']),2)}} TND</span>
                                    </div>
                                </div>
                                @php
                                 $total= $total +(($items_list->price-(($items_list->discount)*$items_list->price)/100)*$data['item_quantity']);
                                @endphp

                            @endif
                        @endforeach

                    </div>
                    <div class="order-summary-bottom">
                        <h4>Total <span>{{number_format($total,2)}} TND</span></h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
@section('scripts')

@endsection
