

 <script src="{{asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
 <script src="{{asset('frontend/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>
 <script src="{{asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
 <script src="{{asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/slick.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/wow.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/svg-inject.min.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/jquery-ui.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/jquery-ui-touch-punch.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/magnific-popup.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/select2.min.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/clipboard.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/vivus.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/waypoints.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/counterup.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/mouse-parallax.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/images-loaded.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/isotope.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/scrollup.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins/ajax-mail.js')}}"></script>
 <!-- Main JS -->
 <script src="{{asset('frontend/assets/js/main.js')}}"></script>



    <script>
        $(document).ready(function () {
                $('.add-to-news-btn').click(function (e) {
                    e.preventDefault();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var news_id = $(this).closest('.news_data').find('.news_id').val();
                    //alert(news_id);
                    $.ajax({
                        url:"{{route('addtonews.status')}}",
                        method: "POST",
                        data: {
                            _token:'{{csrf_token()}}',
                            'email': news_id,
                        },
                        success: function (response) {
                            if(response.condition == 'no'){
                                alertify.set('notifier','position','bottom-right');
                                alertify.error(response.status);
                                $('.news_id').val('');
                            }else{
                                alertify.set('notifier','position','bottom-right');
                                alertify.success(response.status);
                                $('.news_id').val('');
                            }
                        // alert(response.status);

                        }
                    });
                });
            });
    </script>

    <script>

        $(document).ready(function () {
            $('.add-to-cart-btn').click(function (e) {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var product_id = $(this).closest('.product_data').find('.product_id').val();
                var quantity = $(this).closest('.product_data').find('.qty-input').val();

                //alert(quantity);

                $.ajax({
                    url:"{{route('addtocart.status')}}",
                    method: "POST",
                    data: {
                        _token:'{{csrf_token()}}',
                        'quantity': quantity,
                        'product_id': product_id,
                    },
                    success: function (response) {


                        if(response.condition == 'no'){
                            alertify.set('notifier','position','bottom-left');
                            alertify.error(response.status);
                        }else{
                            alertify.set('notifier','position','bottom-left');
                            alertify.success(response.status);
                        }
                        //alert(response.status)
                       cartload();
                    }
                });
            });
        });


        $(document).ready(function () {
            cartload();
        });

        function cartload()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('loadtocart.status')}}",
                method: "GET",
                success: function (response) {
                    $('.basket-item-count').html('');
                    var parsed = jQuery.parseJSON(response)
                    var value = parsed; //Single Data Viewing
                    $('.basket-item-count').append(value['totalcart']);
                }
            });
        }
    </script>


 @yield('scripts')
