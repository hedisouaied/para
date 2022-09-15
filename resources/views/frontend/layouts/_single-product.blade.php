

@foreach ($products as $product)
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
                <a href="{{route('grandcategorie.detail',(\App\Models\Grandcategory::where('id',$product->grand_cat_id)->value('slug')))}}">{{\App\Models\Grandcategory::where('id',$product->grand_cat_id)->value('title')}}</a>
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

