<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if lt IE 7 ]> <html lang="en" class="ie6">    <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7">    <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8">    <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9">    <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lavoro | Home 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon
  ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('resources') }}/img/favicon.ico">

    <!-- Fonts
  ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet'
        type='text/css'>

    <!-- CSS  -->

    <!-- Bootstrap CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/sweetalert.css">
    <link rel="stylesheet" href="{{ url('resources') }}/css/bootstrap.min.css">

    <!-- owl.carousel CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/owl.carousel.css">

    <!-- owl.theme CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/owl.theme.css">

    <!-- owl.transitions CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/owl.transitions.css">

    <!-- font-awesome.min CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/font-awesome.min.css">

    <!-- font-icon CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/fonts/font-icon.css">

    <!-- jquery-ui CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/jquery-ui.css">

    <!-- mobile menu CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/meanmenu.min.css">

    <!-- nivo slider CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/custom-slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="{{ url('resources') }}/custom-slider/css/preview.css" type="text/css"
        media="screen" />

    <!-- animate CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/animate.css">

    <!-- normalize CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/normalize.css">

    <!-- main CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/main.css">

    <!-- style CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/style.css">

    <!-- responsive CSS
  ============================================ -->
    <link rel="stylesheet" href="{{ url('resources') }}/css/responsive.css">

    <script src="{{ url('resources') }}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="home-one">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <!-- header area start -->
    @include('components.header')

    <!-- header area end -->


    @yield('content')
    <!-- FOOTER START -->
    @include('components.footer')
    <!-- FOOTER END -->

    <!-- JS -->

    <!-- jquery-1.11.3.min js
  ============================================ -->
    <script src="{{ url('resources') }}/js/vendor/jquery-1.11.3.min.js"></script>

    <!-- bootstrap js
  ============================================ -->
    <script src="{{ url('resources') }}/js/bootstrap.min.js"></script>

    <!-- Nivo slider js
  ============================================ -->
    <script src="{{ url('resources') }}/custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="{{ url('resources') }}/custom-slider/home.js" type="text/javascript"></script>

    <!-- owl.carousel.min js
  ============================================ -->
    <script src="{{ url('resources') }}/js/owl.carousel.min.js"></script>

    <!-- jquery scrollUp js 
  ============================================ -->
    <script src="{{ url('resources') }}/js/jquery.scrollUp.min.js"></script>

    <!-- price-slider js
  ============================================ -->
    <script src="{{ url('resources') }}/js/price-slider.js"></script>

    <!-- elevateZoom js 
  ============================================ -->
    <script src="{{ url('resources') }}/js/jquery.elevateZoom-3.0.8.min.js"></script>

    <!-- jquery.bxslider.min.js
  ============================================ -->
    <script src="{{ url('resources') }}/js/jquery.bxslider.min.js"></script>

    <!-- mobile menu js
  ============================================ -->
    <script src="{{ url('resources') }}/js/jquery.meanmenu.js"></script>

    <!-- wow js
  ============================================ -->
    <script src="{{ url('resources') }}/js/wow.js"></script>
    <!-- gmap js
  ============================================ -->
    <script src="{{ url('resources') }}/js/gmap.js"></script>
    <!-- plugins js
  ============================================ -->
    <script src="{{ url('resources') }}/js/plugins.js"></script>

    <!-- main js
  ============================================ -->
    <script src="{{ url('resources') }}/js/main.js"></script>
    <script src="{{ url('resources') }}/js/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
              
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                
                $.ajax({
                         url: "{{route('cart.add')}}",
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                        success:function(data){
                          swal({
                                title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                                showCancelButton: true,
                                cancelButtonText: "Xem ti???p",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "??i ?????n gi??? h??ng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
                           
                        }

                    });
            });
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
              url: "{{route('select.dev')}}",
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
    </script>
    
</body>

</html>
