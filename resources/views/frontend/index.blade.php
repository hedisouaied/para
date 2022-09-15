@extends('frontend.layouts.master')


@section('content')

        <div class="slider-area">
            <div class="hero-slider-active-2 dot-style-1 dot-style-1-position-1">

                @foreach ($banners as $banner )
                <div class="single-hero-slider single-animation-wrap slider-height-2 custom-d-flex custom-align-item-center bg-img" style="background-image:url({{$banner->photo}});">
                    <div class="custom-container">
                        <div class="row align-items-center slider-animated-1">
                            <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                                <div class="hero-slider-content-2">
                                    <h1 class="animated" style="padding: 12px;background: rgba(0,0,0,0.5);border-radius: 6px;color:white;margin-bottom:20px;" >{{$banner->title}}</h1>

                                    <div class="btn-style-1">
                                        <a class="animated btn-1-padding-3" href="{{route('products')}}"> Voir tous les produits </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>


        <div class="product-area pt-80 pb-75">
            <div class="custom-container">
                <div class="product-area-border">
                    <div class="section-title-timer-wrap">
                        <div class="section-title-1 section-title-hm2">
                            <h2>Offre quotidienne du jour</h2>
                        </div>
                        <div  class="timer-style-1">
                            <span>Ne ratez pas l'offre</span>
                        </div>

                    </div>
                    <div class="product-slider-active-1 nav-style-2 product-hm1-mrg">

                        @foreach ($hot_products as $hotproduct )

                        @php
                            $photos = explode(',',$hotproduct->photo);
                        @endphp
                            <div class="product-plr-1">
                                <div class="single-product-wrap">
                                    <div class="product-badges product-badges-mrg">
                                        @if ($hotproduct->discount >= 30 )
                                        <span class="hot yellow">Hot</span>
                                        @endif

                                        <span class="discount red">-{{$hotproduct->discount}}%</span>

                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{route('grandcategorie.detail',(\App\Models\Grandcategory::where('id',$hotproduct->grand_cat_id)->value('slug')))}}">{{\App\Models\Grandcategory::where('id',$hotproduct->grand_cat_id)->value('title')}}</a>
                                        </div>
                                        <h2><a href="{{route('product.detail',$hotproduct->slug)}}">{{$hotproduct->title}}</a></h2>
                                        <div class="product-price">
                                            <span class="new-price">{{number_format(($hotproduct->price-(($hotproduct->price*$hotproduct->discount)/100)),2)}} TND</span>
                                            <span class="old-price">{{number_format($hotproduct->price,2)}} TND</span>
                                        </div>
                                    </div>
                                    <div class="product-img-action-wrap mb-20 mt-25">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.detail',$hotproduct->slug)}}">

                                                <img class="default-img" src="{{$photos[0]}}" style="height:300px;object-fit:cover;background:white;">
                                                @if (count($photos)>1)
                                                <img class="hover-img" src="{{$photos[1]}}" style="height:300px;object-fit:cover;background:white;">
                                                @endif

                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>

        @foreach ($grandcats as $grandcat )

        <div class="product-area pb-30">
            <div class="custom-container">
                <div class="section-title-btn-wrap st-btn-wrap-xs-center wow tmFadeInUp mb-35">
                    <div class="section-title-1 section-title-hm2">
                        <h2>{{$grandcat->title}}</h2>
                    </div>
                    <div class="btn-style-2 mrg-top-xs">
                        <a href="{{route('products')}}">Voir tous les produits <i class="far fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="slidebar-product-wrap slidebar-product-bg-1 wow tmFadeInUp">

                            <div class="slidebar-product-details">
                                <ul>
                                    @foreach (\App\Models\Category::where('status','active')->where('grand_cat_id',$grandcat->id)->orderby('title','ASC')->get() as $cat )
                                    <li><a href="{{route('categorie.detail',$cat->slug)}}"><i class="far fa-long-arrow-alt-right"></i> {{$cat->title}}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">

                            @foreach (\App\Models\Product::where('status','active')->where('grand_cat_id',$grandcat->id)->inRandomOrder()->limit('4')->get() as $product )
                            @php
                            $photos = explode(',',$product->photo);
                            @endphp

                            <div class="col-xl-3 col-lg-4 col-md-4 col-12 col-sm-6">
                                <div class="single-product-wrap mb-50 wow tmFadeInUp">
                                    <div class="product-img-action-wrap mb-10">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{route('product.detail',$product->slug)}}">
                                                <img class="default-img" src="{{$photos[0]}}" style="height:300px;object-fit:cover;background:white;">
                                                @if (count($photos)>1)
                                                <img class="hover-img" src="{{$photos[1]}}" style="height:300px;object-fit:cover;background:white;">
                                                @endif
                                            </a>
                                        </div>
                                        @if ($product->discount !== 0)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                @if ($product->discount >= 30 )
                                                <span class="hot yellow">Hot</span>
                                                @endif
                                                <span class="red">-20%</span>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="{{route('grandcategorie.detail',$grandcat->slug)}}">{{$grandcat->title}}</a>
                                        </div>
                                        <h2><a href="{{route('product.detail',$product->slug)}}">{{$product->title}}</a></h2>

                                        @if ($product->discount !== 0)
                                        <div class="product-price">
                                            <span class="new-price">{{number_format(($product->price-(($product->price*$product->discount)/100)),2)}} TND</span>
                                            <span class="old-price">{{number_format($product->price,2)}} TND</span>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <span>{{number_format($product->price,2)}} TND</span>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach



        <div class="blog-testimonial-area pt-75 pb-75">
            <div class="custom-container">
                <div class="row">
                    <div class="col-width-44">
                        <div class="blog-area">
                            <div class="section-title-1 mb-40 wow tmFadeInUp">
                                <h2><a href="{{route('blog.list')}}" >Nos Derniers articles</a></h2>
                            </div>

                            @foreach ($blogs as $blog )
                                <div class="blog-wrap mb-40 wow tmFadeInUp">
                                    <div class="blog-img">
                                        <a href="{{route('blog.detail',$blog->slug)}}"><img src="{{$blog->photo}}" alt=""></a>

                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-meta">
                                            <span><i class="far fa-calendar"></i> {{date('M d, Y',strtotime($blog->updated_at))}}</span>
                                        </div>
                                        <h3><a href="{{route('blog.detail',$blog->slug)}}">{{$blog->title}}</a></h3>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-width-56">
                        <div class="testimonial-area wow tmFadeInUp">
                            <span class="pagingInfo"></span>
                            <div class="testimonial-active-2 nav-style-3">

                                @foreach ($feedbacks as $feedback )
                                <div class="testimonial-plr-1">
                                    <div class="single-testimonial-2">

                                        <p><q>{{$feedback->description}}</q></p>
                                        <div class="client-info-2">
                                            <img src="{{$feedback->photo}}" style="width: 100px;height:100px;object-fit:cover;border-radius:50%;"  >
                                            <h5>{{$feedback->title}}</h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="brand-logo-area pb-35">
            <div class="custom-container">
                <div class="section-title-1 section-title-hm2 mb-30 wow tmFadeInUp">
                    <h2>Nos Marques</h2>
                </div>
                <div class="row align-items-center">

                    @foreach ($partenaires as $partenaire )
                    <div class="col-lg-2 col-md-4 col-6 col-sm-4">
                        <div class="single-brand-logo mb-30 wow tmFadeInUp">
                            <a><img src="{{$partenaire->photo}}" alt=""></a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>



@endsection


@section('scripts')

@if (session()->has('success'))
<script>
    $(document).ready(function(){
        alertify.set('notifier','position','bottom-left');
        alertify.success('{{session()->get('success')}}');
    })
</script>
@endif

@endsection

