@extends('frontend.layouts.master')

@section('content')

<div class="breadcrumb-area breadcrumb-area-padding-2 bg-gray-2">
    <div class="custom-container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Accueil</a>
                </li>
                <li>
                    <a href="{{route('grandcategorie.detail',(\App\Models\Grandcategory::where('id',$category->grand_cat_id)->value('slug')))}}">{{\App\Models\Grandcategory::where('id',$category->grand_cat_id)->value('title')}}</a>
                </li>
                <li class="active">{{$category->title}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-area pt-75 pb-55">
    <div class="custom-container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper">
                    <div class="totall-product">
                        <p> Il y a <span>{{count($products)}}</span> produits</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="far fa-align-left"></i>Trier par <i class="far fa-angle-down"></i></span>
                            </div>

                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a href="?sort">Par défault</a></li>
                                <li><a href="?sort=titleAsc">Alphabétique (croissant)</a></li>
                                <li><a href="?sort=titleDesc">Alphabétique (décroissant)</a></li>
                                <li><a href="?sort=priceAsc">Prix (croissant)</a></li>
                                <li><a href="?sort=priceDesc">Prix (décroissant)</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="shop-bottom-area">
                    <div class="row" id="product-data" >
                        @include('frontend.layouts._single-product')

                    </div>
                    <div class="ajax-load text-center" style="display: none">
                        <img src="{{asset('frontend/pre.gif')}}" style="width: 30%;" >
                    </div>
                    @if (count($products)==0)
                        <p>Il n'y a pas de produits</p>
                    @endif
                </div>
            </div>

            <div class="col-lg-3">
                <div class="sidebar-wrapper sidebar-wrapper-mr1">
                    <div class="sidebar-widget sidebar-widget-wrap sidebar-widget-padding-1 mb-20">
                        <h4 class="sidebar-widget-title">Sous categories </h4>
                        <div class="sidebar-categories-list">
                            <ul>



                                @if (count(\App\Models\Souscategory::where('status','active')->where('sous_cat_id',$category->id)->get()) !==0 )

                                    @foreach (\App\Models\Souscategory::where('status','active')->where('sous_cat_id',$category->id)->get() as $soussouscat )

                                    <li><a href="{{route('souscategorie.detail',$soussouscat->slug)}}">{{$soussouscat->title}}</a></li>
                                    @endforeach
                                @else
                                ....
                                @endif

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('scripts')

<script>
    $('#sortBy').change(function(){
        var sort=$('#sortBy').val();

        var get_fiter ='@if (isset($_GET['search']))&search=@php echo $_GET['search']@endphp@endif';
        get_fiter +='@if (isset($_GET['search_conditions']))&search_conditions=@php echo $_GET['search_conditions']@endphp@endif';
        get_fiter +='@if (isset($_GET['search_type']))&search_type=@php echo $_GET['search_type']@endphp@endif';
        get_fiter +='@if (isset($_GET['price_range']))&price_range=@php echo $_GET['price_range']@endphp@endif';
        get_fiter +='@if (isset($_GET['surface_range']))&surface_range=@php echo $_GET['surface_range']@endphp@endif';
        get_fiter +="@php if (isset($_GET['speciality'])){ foreach($_GET['speciality'] as $sps){ echo '&speciality[]='.$sps; } }@endphp";



        window.location="{{url(''.$route.'')}}?sort="+sort+get_fiter;
    });
    </script>

<script>
    function loadmoreData(page) {
        $.ajax({
            url: '?page='+page,
            type: 'GET',
            beforeSend: function () {
                $('.ajax-load').show();
            },
        }).done(function(data){

            if(data.html == ''){
                $('.ajax-load').html('');
                return;
            }
            $('.ajax-load').hide();
            $('#product-data').append(data.html);
        }).fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log('Somethong went wrong!! please try again');
        });
    }
    var page=1;
    $(window).scroll(function () {
        if($(window).scrollTop() +$(window).height()+420>=$(document).height()){
            page ++;
            loadmoreData(page);
        }
    });




</script>


@endsection
