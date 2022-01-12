<!--====== HEADER PART START ======-->
<header id="header-part">
    <div class="header-top d-none d-lg-block">
       <div class="container-fluid">
          <div class="row">
             <div class="col-lg-6">
                <div class="header-contact text-lg-left text-center">
                   <ul>
                      @if($setting_detail->facebook !=NULL)
                      <li> <a href="{{$setting_detail->facebook}}" class="social" target="_blank"> <i class="fa fa-facebook-f"></i> </a> </li>
                      @endif
                      @if($setting_detail->twitter !=NULL)
                      <li> <a href="{{$setting_detail->twitter}}" class="social" target="_blank"> <i class="fa fa-twitter"></i> </a> </li>
                      @endif
                      @if($setting_detail->linkdin !=NULL)
                      <li> <a href="{{$setting_detail->linkdin}}" class="social" target="_blank"> <i class="fa fa-linkedin" aria-hidden="true"></i> </a> </li>
                      @endif
                      @if($setting_detail->instagram !=NULL)
                      <li> <a href="{{$setting_detail->instagram}}" class="social" target="_blank"> <i class="fa fa-instagram"></i> </a> </li>
                      @endif
                      @if($setting_detail->youtube !=NULL)
                      <li> <a href="{{$setting_detail->youtube}}" class="social" target="_blank"> <i class="fa fa-youtube"></i> </a> </li>
                      @endif
                   </ul>
                </div>
             </div>
             <div class="col-lg-6">
                <div class="header-contact text-lg-right text-center">
                   <ul>
                      @if($setting_detail->whatsapp_number !=NULL)
                      <li> <a href="tel:{{$setting_detail->whatsapp_number}}" class=""> <i class="fa fa-whatsapp" style="font-size:30px"></i> </a> <span> + {{$setting_detail->whatsapp_number}} </span> </li>
                      @endif
                      @if($setting_detail->phone !=NULL)
                      <li> <a href="tel:{{$setting_detail->whatsapp_number}}" class="social"> <i class="fa fa-phone"></i> </a> <span> + {{$setting_detail->phone}} </span> </li>
                      @endif
                      @if($setting_detail->mobile !=NULL)
                      <li> <a href="tel:{{$setting_detail->mobile}}" class="social"> <i class="fa fa-mobile"></i> </a> <span> + {{$setting_detail->mobile}} </span> </li>
                      @endif
                      @if($setting_detail->email !=NULL)
                      <li> <a href="mailto:{{$setting_detail->email}}" class="social"> <i class="fa fa-envelope-o"></i> </a> <span> {{$setting_detail->email}} </span> </li>
                      @endif
                   </ul>
                </div>
             </div>
          </div>
          <!-- row -->
       </div>
       <!-- container -->
    </div>
    <!-- header top -->
    <div class="header-logo-support pt-2">
       <div class="container-fluid">
          <!--  <div class="row">
             <div class="col-lg-3 col-md-3">
                 <div class="logo">
                     <a href="#">
                         <img src="img/logo.png" alt="Logo">
                     </a>
                 </div>
             </div>
             <div class="col-lg-9 col-md-9">
                 <img src="img/menu_banner.jpg" class="imgheader">
             </div>
             </div> -->
          <div class="row">
             <div class="container messages">
                <div class="col-md-12">
                   <marquee class="maq" behavior="scroll" direction="left" scrollamount="18">{{$setting_detail->welcome_msg}}  &#128522; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$setting_detail->welcome_msg}} &#128522;   </marquee>
                     @if ($message = Session::get('success'))
                        <div class="col-lg-4" style="margin-left:1150px  !important;">
                           <div class="alert alert-success alert-block" >
                              <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>{{ $message }}</strong>
                           </div>
                        </div>
                     @endif
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- header logo support -->
    <div class="navigation">
       <div class="container-fluid">
          <div class="row">
             <div class="col-lg-2">
                <div class="logo">
                   <div class="">
                      <div class="logo">
                         <a href="{{route('index')}}">
                         <img src="{{asset('front/img/logo_1.png')}}" class="logoimg">
                         </a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="col-lg-10">
                <div class="wrapper">
                   <input type="radio" name="slider" id="menu-btn">
                   <input type="radio" name="slider" id="close-btn">
                   <ul class="nav-links">
                      <label for="close-btn" class="btn close-btn"><i class="fa fa-times" aria-hidden="true"></i></label>
                      <li><a href="{{route('index')}}">Home</a></li>
                      <li><a href="{{route('about_us')}}">About us</a></li>
                      <li class="mega-nav">
                         <a href="javascritp:void(0)" class="desktop-item"> Our Services </a>
                         <input type="checkbox" id="showDrop2">
                         <label for="showDrop2" class="mobile-item"> Our Services </label>
                         <ul class="drop-menu" style="width: 248px;">
                            @foreach ($ourservices as $ourservices_list)
                            <li><a href="{{route('frontourservices')}}#{{$ourservices_list->service_slug}}">{{$ourservices_list->service_title}}</a></li>
                            @endforeach
                         </ul>
                      </li>
                      <li class="mega-nav">
                         <a href="#" class="desktop-item">Packages</a>
                         <input type="checkbox" id="showDrop">
                         <label for="showDrop" class="mobile-item">Packages</label>
                         <ul class="drop-menu">
                            @foreach ($packages as $packages_list)
                            <li><a href="{{route('frontpackages',$packages_list->packge_slug)}}" class="size">{{$packages_list->package_title}}</a></li>
                            @endforeach
                         </ul>
                      </li>
                      <li class="mega-nav">
                         <a href="javascript:void(0)" class="desktop-item">Themes</a>
                         <input type="checkbox" id="showMega">
                         <label for="showMega" class="mobile-item">Themes</label>
                         <div class="mega-box">
                            <div class="content">
                               <div class="row">
                                  @foreach ($theme as $theme_list)
                                  <div class="col-md-3">
                                     <header>{{$theme_list->title}}</header>
                                     <ul class="mega-links">
                                        <?php  $subtheme = DB::table('subthemes')->where('theme_id',$theme_list->id)->where('status',1)->get(); ?>
                                        @foreach ($subtheme as $subtheme_list)
                                        <li><a href="{{route('frontthemes',$subtheme_list->subtheme_slug)}}#{{$subtheme_list->subtheme_slug}}">• &nbsp; {{$subtheme_list->title}}</a></li>
                                        @endforeach
                                     </ul>
                                  </div>
                                  @endforeach
                               </div>
                               <!-- <div class="row">
                                  <header> Gems of UAE </header>
                                  <ul class="mega-links">
                                  <li><a href="#">Personal Email</a></li>
                                  <li><a href="#">Business Email</a></li>
                                  <li><a href="#">Mobile Email</a></li>
                                  <li><a href="#">Web Marketing</a></li>
                                  </ul>
                                  </div>
                                  <div class="row">
                                  <header> Premium Activities </header>
                                  <ul class="mega-links">
                                  <li><a href="#">Site Seal</a></li>
                                  <li><a href="#">VPS Hosting</a></li>
                                  <li><a href="#">Privacy Seal</a></li>
                                  <li><a href="#">Website design</a></li>
                                  </ul>
                                  </div> -->
                            </div>
                         </div>
                      </li>
                      </li>
                      <li class="mega-nav">
                         <a href="javascript:void(0)" class="desktop-item">Premium Activities</a>
                         <input type="checkbox" id="showDrop1">
                         <label for="showDrop1" class="mobile-item">Premium Activities</label>
                         <ul class="drop-menu" style="width: 248px;">
                            @foreach ($premium_activity as $premium_activity_list)
                            <li><a href="{{route('frontpremiumactivity')}}#{{$premium_activity_list->premiumactivity_slug}}">{{$premium_activity_list->premiumactivity_title}}</a></li>
                            @endforeach
                         </ul>
                      </li>
                      <!-- <li><a href="#">Other Services</a></li> -->
                      <li><a href="{{route('contact_us')}}"> Contact Us </a></li>
                      &nbsp;&nbsp;&nbsp;
                      <li><a href="#" class="main-btn" data-toggle="modal" data-target="#exampleModalCenter">Send an Inquiry</a></li>
                   </ul>
                   <label for="menu-btn" class="btn menu-btn"><i class="fa fa-bars" aria-hidden="true"></i></label>
                </div>
             </div>
          </div>
       </div>
    </div>
 </header>
 <!--====== HEADER PART ENDS ======-->
