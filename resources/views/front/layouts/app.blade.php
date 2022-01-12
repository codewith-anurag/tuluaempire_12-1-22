<!doctype html>
<html lang="en">
<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>{{env('APP_NAME')}}</title>

    <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{asset('front/img/favicon.png')}}" type="image/png">

    <!--====== Slick css ======-->


    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">

    <!--====== Nice Select css ======-->
    <!-- <link rel="stylesheet" href="css/nice-select.css"> -->

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{asset('front/css/jquery.nice-number.min.css')}}">

    <!--====== Magnific Popup css ======-->
    <!-- <link rel="stylesheet" href="css/magnific-popup.css"> -->

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.css')}}">
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css">
    <!--====== Default css ======-->
    <!-- <link rel="stylesheet" href="css/default.css"> -->

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">

    <!--====== Responsive css ======-->
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <link rel="stylesheet"  href="{{asset('front/src/css/lightslider.css')}}"/>
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/admin/custom_style.css')}}">
</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>

    <!--====== PRELOADER PART START ======-->

        @include('front.layouts.header')
             @yield('content')
         @include('front.layouts.footer')

    <!--====== SEARCH BOX PART START ======-->

    <!-- <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div> -->

    <!--====== SEARCH BOX PART ENDS ======-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/60d9caa67f4b000ac039f12c/1f99bv7dn';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
        <!--====== jquery js ======-->
        <script src="{{asset('front/js/vendor/modernizr-3.6.0.min.js')}}"></script>
        
        <!--====== Bootstrap js ======-->
        <!-- <script src="js/bootstrap.js"></script> -->
        <script src="{{asset('front/js/bootstrap.min.js')}}"></script>

         <script src="{{asset('front/js/owl.carousel.js')}}"></script>

        <!--====== Slick js ======-->
        <script src="{{asset('front/js/slick.min.js')}}"></script>

        <!--====== Magnific Popup js ======-->
        <script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>

        <!--====== Counter Up js ======-->
        <script src="{{asset('front/js/waypoints.min.js')}}"></script>
        <script src="{{asset('front/js/jquery.counterup.min.js')}}"></script>

        <!--====== Nice Select js ======-->
        <script src="{{asset('front/js/jquery.nice-select.min.js')}}"></script>

        <!--====== Nice Number js ======-->
        <script src="{{asset('front/js/jquery.nice-number.min.js')}}"></script>

        <!--====== Count Down js ======-->
        <script src="{{asset('front/js/jquery.countdown.min.js')}}"></script>

        <!--====== Validator js ======-->
        <script src="{{asset('front/js/validator.min.js')}}"></script>

        <!--====== Ajax Contact js ======-->
        <script src="{{asset('front/js/ajax-contact.js')}}"></script>

        <!--====== Main js ======-->
        <script src="{{asset('front/js/main.js')}}"></script>

        <!--====== Map js ======-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
        <script src="{{asset('front/js/map-script.js')}}"></script>
        <script src="{{asset('front/src/js/lightslider.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script>
    setTimeout(function(){ $(".alert-success").hide(); }, 3000);
</script>
    <script>
        $(".nav-links li.mega-nav").click(function (e) {
            // e.preventDefault();
            e.stopPropagation();
            
            $(".mega-box").removeClass('onclickNavOpen');
            $(".drop-menu").removeClass('onclickNavOpen');
            $(this).children(".mega-box").toggleClass('onclickNavOpen');
            $(this).children(".drop-menu").toggleClass('onclickNavOpen');
        });
        $(document).click(function() {
            $(".mega-box").removeClass('onclickNavOpen');
            $(".drop-menu").removeClass('onclickNavOpen');
        });
    </script>

     <script>
       var phoneInputField = document.querySelector("#phone10");
       var phoneInput = window.intlTelInput(phoneInputField, {
         utilsScript:
           "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
       });
     </script>

     <script>
       var phonewater = document.querySelector("#phonewater");
       var phoneInput = window.intlTelInput(phonewater, {
         utilsScript:
           "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
       });
     </script>

<script>
    $(document).ready(function() {
        var code = $(this).find('.iti__dial-code').html();
        $("#phonewater").val(code);
       $('.iti__country').click(function(event) {
          var code = $(this).find('.iti__dial-code').html();
          $("#phonewater").val(code);
          if (event.keyCode === 13) {
             $("#phonewater").val(code);
           }
       });

    });
</script>
<script>
    $(document).ready(function() {
        var code = $(this).find('.iti__dial-code').html();
        $("#phone10").val(code);
       $('.iti__country').click(function(event) {
          var code = $(this).find('.iti__dial-code').html();
          $("#phone10").val(code);
          if (event.keyCode === 13) {
             $("#phone10").val(code);
           }
       });

    });
</script>
</body>
</html>
