@extends('front.layouts.app')
@section('content')
</head>
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/img/page-banner-1.jpg')}})"></section>
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-from">
                        <div class="section-title">
                            <h5>Contact Us</h5>
                            <h2>Keep in touch</h2>

                        </div>
                        <div class="main-form pt-45">
                            <form id="contact-form" action="{{url('send_contactus')}}" method="post" data-toggle="validator" novalidate="true">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group has-error has-danger">
                                            <input name="name" type="text" placeholder="Your name*" data-error="Name is required." required="required">
                                        </div>
                                        @error('name')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="email" type="email" placeholder="Email*" data-error="Valid email is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        @error('email')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 contact-code">

                                        <input id="phonewater" type="tel" name="phone" required="required" />

                                    </div>
                                    @error('phone')
                                            <div class="input_error">{{ $message }}</div>
                                        @enderror

                                    <div class="col-md-12">
                                        <div class="singel-form form-group">
                                            <textarea name="messege" placeholder="Messege*" data-error="Please,leave us a message." required="required"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    @error('messege')
                                        <div class="input_error">{{ $message }}</div>
                                    @enderror

                                    <p class="form-message">
                                    </p>
                                    <div class="col-md-12">
                                        <div class="singel-form">
                                            <button type="submit" class="main-btn disabled contact ">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-address">
                        <div class="contact-heading">
                            <h5>Address</h5>
                            <p>If you have any further questions, please don’t hesitate to contact me.</p>
                        </div>
                        <br>
                        @foreach ($contact_detail as $contact_detail_list)
                        @if($contact_detail_list->barnch_name!="")
                            <h5>{{$contact_detail_list->barnch_name}}</h5>
                        @endif
                        <ul>
                            @if($contact_detail_list->address!="")
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p> {{$contact_detail_list->address}} </p>
                                    </div>
                                </div> 
                            </li>
                            @endif
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p> +{{$contact_detail_list->phone1}} </p>
                                        <p> +{{$contact_detail_list->phone2}}  </p>
                                    </div>
                                </div> 
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p> {{$contact_detail_list->email}}  </p>                                        
                                    </div>
                                </div> 
                            </li>
                            <br>

                        </ul>
                        @endforeach
                    </div>
                </div>
            </div> 
        </div>
    </section>

<div class="hidden-xs wave__footer">
   <div class="wave__ft1"></div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$(".contact").on("click",function(){
    jQuery("div .messages").animate({ scrollTop: jQuery(window).height()}, 1500);
});


</script>
@endsection
