@extends('frontend.layouts.master')

@section('content')



<div class="breadcrumb-area breadcrumb-area-padding-2 bg-gray-2">
    <div class="custom-container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li>
                    <a href="{{route('home')}}">Accueil</a>
                </li>
                <li class="active">Panier</li>
            </ul>
        </div>
    </div>
</div>

<div class="my-propertiestt" >
    @if(isset($cart_data) && !empty($cart_data))

            @if(Cookie::get('shopping_cart'))
            @php $total=0; @endphp

                <div class="cart-area pt-75 pb-35 ">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <form action="#">
                                    <div class="cart-table-content">
                                        <div class="table-content table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="width-thumbnail">Produit</th>
                                                        <th class="width-name"></th>
                                                        <th class="width-price"> Prix</th>
                                                        <th class="width-quantity">Quantité</th>
                                                        <th class="width-subtotal">Total</th>
                                                        <th class="width-remove"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($cart_data as $data)
                                                        @php
                                                            $items_list = \App\Models\Product::find($data['item_id']);
                                                        @endphp
                                                            @if ($items_list)

                                                                @php
                                                                    $photos = explode(',',$items_list->photo);
                                                                @endphp

                                                                <tr class="cartpage" >
                                                                    <input type="hidden" class="product_id" value="{{ $data['item_id'] }}" >

                                                                    <td class="product-thumbnail">
                                                                        <a href="{{route('product.detail',$items_list->slug)}}"><img src="{{$photos[0]}}" alt=""></a>
                                                                    </td>
                                                                    <td class="product-name">
                                                                        <h5><a href="{{route('product.detail',$items_list->slug)}}">{{$items_list->title}}</a></h5>
                                                                    </td>



                                                                    <td class="product-price">
                                                                        @if ($items_list->discount == 0)
                                                                        <span class="amount">{{number_format($items_list->price,2)}} TND</span>
                                                                        @else
                                                                        <del>{{number_format($items_list->price,2)}} TND</del>
                                                                        <br>
                                                                        <span class="amount">{{number_format(($items_list->price-(($items_list->discount)*$items_list->price)/100),2)}} TND</span>

                                                                        @endif

                                                                        @php
                                                                        $total= $total +(($items_list->price-(($items_list->discount)*$items_list->price)/100)*$data['item_quantity']);
                                                                        @endphp

                                                                    </td>
                                                                    <td class="cart-quality">
                                                                        <div class="">
                                                                            <p class="text-center" >{{$data['item_quantity']}}</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-total"><span>{{number_format((($items_list->price-(($items_list->discount)*$items_list->price)/100)*$data['item_quantity']),2)}} TND</span></td>
                                                                    <td class="product-remove"><a href="" class="delete_cart_data" >Supprimer</a></td>
                                                                </tr>
                                                            @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="cart-shiping-update-wrapper">
                                            <div class="continure-clear-btn">
                                                <div class="continure-btn">
                                                    <a href="{{route('products')}}">Continuez shopping</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12 col-12">

                                        </div>
                                        <div class="col-lg-8 col-md-12 col-12">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12">

                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="grand-total-wrap mb-40">

                                                        <div class="grand-total">
                                                            <h4>Total <span class="basket-item-prix" >{{number_format($total,2)}} TND</span></h4>
                                                        </div>
                                                        <div class="grand-total-btn">
                                                            <a href="{{route('checkout.status')}}">Passer commande</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endif

    @else

    <div class="error-area">
        <div class="container">
            <div class="row align-items-center pt-75 pb-55">
                <div class="col-lg-8 ml-auto mr-auto">
                    <div class="error-content text-center">

                        <h2> Oops! Panier vide.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>




@endsection

@section('scripts')
<script>
// Delete Cart Data
    $(document).ready(function () {

        $('.delete_cart_data').click(function (e) {
            e.preventDefault();

            var product_id = $(this).closest(".cartpage").find('.product_id').val();
            var data = {
                '_token': $('input[name=_token]').val(),
                "product_id": product_id,
            };

         $(this).closest(".cartpage").remove();

            $.ajax({
                url: "{{route('deleteselection.status')}}",
                type: 'GET',
                data: data,
                success: function (response) {
                    $('.basket-item-count').html(response.count);
                    $('.basket-item-prix').html(response.total+" TND");
                   if(response.count == 0){

                       $('.my-propertiestt').html('<div class="error-area"><div class="container"><div class="row align-items-center pt-75 pb-55"><div class="col-lg-8 ml-auto mr-auto"><div class="error-content text-center"><h2> Oops! Panier vide.</h2></div></div></div></div></div>');
                   }
                    // window.location.reload();
                }
            });
        });

    });
</script>
@endsection
