@extends('frontend.layouts.master')

@section('content')



<div class="breadcrumb-area breadcrumb-area-padding-2 bg-gray-2">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Accueil</a>
                </li>
                <li>
                    <a href="{{route('grandcategorie.detail',(\App\Models\Grandcategory::where('id',$product->grand_cat_id)->value('slug')))}}">{{\App\Models\Grandcategory::where('id',$product->grand_cat_id)->value('title')}}</a>
                </li>
                <li>
                    <a href="{{route('categorie.detail',(\App\Models\Category::where('id',$product->cat_id)->value('slug')))}}">{{\App\Models\Category::where('id',$product->cat_id)->value('title')}}</a>
                </li>
                @if ($product->child_cat_id !== null)
                <li>
                    <a href="{{route('souscategorie.detail',(\App\Models\Souscategory::where('id',$product->child_cat_id)->value('slug')))}}">{{\App\Models\Souscategory::where('id',$product->child_cat_id)->value('title')}}</a>
                </li>
                @endif

                <li class="active">{{$product->title}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="product-details-area padding-30-row-col pt-75 pb-75">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="product-details-wrap">
                    <div class="product-details-wrap-top">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="product-details-slider-wrap">
                                    <div class="pro-dec-big-img-slider">

                                        @php
                                            $photos = explode(",",$product->photo);
                                        @endphp
                                        @foreach ($photos as $photo )
                                        <div class="single-big-img-style">
                                            <div class="pro-details-big-img">
                                                <a class="img-popup" href="{{$photo}}">
                                                    <img src="{{$photo}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach


                                    </div>
                                    <div class="product-dec-slider-small product-dec-small-style1">
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($photos as $photo )
                                        <div class="product-dec-small @if ($i==0) active @endif">
                                            <img src="{{$photo}}" alt="">
                                        </div>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="product-details-content pro-details-content-pl">

                                    <h1> {{$product->title}}</h1>

                                    <div class="pro-details-price-short-description">

                                        @if ($product->discount !== 0)
                                        <div class="pro-details-price">
                                            <span class="new-price">{{number_format(($product->price-(($product->price*$product->discount)/100)),2)}} TND</span>
                                            <span class="old-price">{{number_format($product->price,2)}} TND</span>
                                        </div>
                                        @else
                                        <div class="pro-details-price">
                                            <span style="color: rgb(105 134 41);" >{{number_format($product->price,2)}} TND</span>
                                        </div>
                                        @endif

                                        <div class="pro-details-short-description">
                                            <p>{!!$product->description!!}</p>
                                        </div>
                                    </div>

                                    <div class="product_data" >

                                        <div class="pro-details-quality-stock-area">
                                            <span>Quantité</span>
                                            <div class="">
                                                <div>
                                                    <input class="qty-input"  type="number" value="1" min="1" >
                                                    <input type="hidden" class="product_id" value="{{$product->id}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pro-details-action-wrap">
                                            <div class="pro-details-add-to-cart">
                                                <button class="add-to-cart-btn" >Add to cart</button>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="product-details-social tooltip-style-4 a2a_kit a2a_kit_size_32 a2a_default_style">
                                        <p style="margin-right: 10px;" >Partager Sur : </p>
                                        <a aria-label="Facebook" class="facebook a2a_button_facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a aria-label="Twitter" class="twitter a2a_button_twitter" href="#"><i class="fab fa-twitter"></i></a>
                                        <a aria-label="Linkedin" class="linkedin a2a_button_linkedin" href="#"><i class="fab fa-linkedin"></i></a>
                                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection




@section('scripts')


@endsection
