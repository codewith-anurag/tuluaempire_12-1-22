<!--====== FOOTER PART START ======-->
<footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="{{route('index')}}"><img src="{{asset('front/img/logo-1.png')}}" alt="Logo"></a>
                            </div>
                            <p class="pt-10"> Tulua Empire Pvt Ltd. reflects the perfect blend of international and local knowledge. We are headed towards redefining the role of Travel & Destination Management Company. </p>
                         <div class="footer-address mt-40">
                         <!--    <div class="footer-title pb-25">
                                <h6>Contact Us</h6>
                            </div> -->
                            <!-- <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p> Lorem, ipsum dolor sit amet consectetur adipisicing!</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+3 123 456 789</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>info@yourmail.com</p>
                                    </div>
                                </li>
                            </ul> -->
                        </div>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Menu</h6>
                            </div>
                            <ul>
                                <li><a href="{{route('index')}}"><i class="fa fa-angle-right"></i>Home</a></li>
                                <li><a href="{{route('about_us')}}"><i class="fa fa-angle-right"></i>About us</a></li>
                                <li><a href="{{route('frontourservices')}}"><i class="fa fa-angle-right"></i> Our Services </a></li>
                                <li><a href="{{route('frontpackages')}}"><i class="fa fa-angle-right"></i>Packages</a></li>
                                <li><a href="{{route('frontthemes')}}"><i class="fa fa-angle-right"></i>Themes</a></li>
                                <li><a href="{{route('frontpremiumactivity')}}"><i class="fa fa-angle-right"></i>Premium Activities</a></li>
                                <li><a href="{{route('contact_us')}}"><i class="fa fa-angle-right"></i>Contact Us </a></li>
                                <!-- <li><a href="#"><i class="fa fa-angle-right"></i>Theme</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Other Service</a></li> -->
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Top Picks</h6>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Overnight Desert Safari</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Burj Khalifa - At the top</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>The Palm Island</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Yatch Ride</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Dubai Parks & Resorts</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Ferrari World</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Ski Dubai</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Limousine Ride</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>La-Perle Show</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                         @foreach ($contact_detail as $contact_detail_list)

                         @if($contact_detail_list->barnch_name!="")
                           <div class="footer-title pt-5 pb-25">
                                <h6>{{$contact_detail_list->barnch_name}}</h6>
                            </div>
                            @endif
                            <div class="footer-address">
                         <!--    <div class="footer-title pb-25">
                                <h6>Contact Us</h6>
                            </div> -->
                            <ul>
                                @if($contact_detail_list->address!="")
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p> {{$contact_detail_list->address}}</p>
                                    </div>
                                </li>
                                @endif
                                @if($contact_detail_list->phone1!="")
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone" ></i>
                                    </div>
                                    <div class="cont">
                                        <p> + {{$contact_detail_list->phone1}}</p>
                                    </div>
                                </li>
                                @endif
                                @if($contact_detail_list->phone2!="")
                                <li>
                                    <div class="icon">
                                    <i class="fa fa-mobile" aria-hidden="true" style="font-size: 25px;"></i>
                                    </div>
                                    <div class="cont">
                                        <p>+{{$contact_detail_list->phone2}}</p>
                                    </div>
                                </li>
                                @endif
                                @if($contact_detail_list->email!="")
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>{{$contact_detail_list->email}}</p>
                                    </div>
                                </li>
                                @endif

                            </ul>
                        </div>
                        @endforeach
                            <!-- <div class="footer-about">
                                   <ul>
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                            </div> -->
                    </div>

                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->

        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p> © Copyright {{date('Y')}}. All Rights Reserved by &nbsp; <a target="_blank" href="{{route('index')}}" style="color: #f8992d;">{{env('APP_NAME')}}</a> </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">
                        <div class="footer-about">
                                <ul>
                                    @if($setting_detail->facebook != NULL)
                                        <li><a href="{{$setting_detail->facebook}}" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                                    @endif
                                    @if($setting_detail->twitter != NULL)
                                        <li><a href="{{$setting_detail->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if($setting_detail->linkdin != NULL)
                                        <li><a href="{{$setting_detail->linkdin}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    @endif
                                    @if($setting_detail->instagram != NULL)
                                        <li><a href="{{$setting_detail->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    @endif
                                    @if($setting_detail->youtube != NULL)
                                        <li><a href="{{$setting_detail->youtube}}" target="_blank"><i class="fa fa-youtub"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--====== BACK TO TP PART ENDS ======-->


    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content back">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Send an Inquiry</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="POST" action="{{route('send_inquiry')}}">
            @csrf
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                    <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="options[]" type="checkbox" id="inlineCheckbox1" value="packages" required>
                                <label class="form-check-label" for="inlineCheckbox1">Packages</label>
                            </div>
                        </div>
                            <div class="col-md-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="options[]"  type="checkbox" id="inlineCheckbox1" value="Activities" required>
                                    <label class="form-check-label" for="inlineCheckbox1">Activities</label>

                                </div>
                            </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="options[]"  type="checkbox" id="inlineCheckbox1" value="Others" required>
                                <label class="form-check-label" for="inlineCheckbox1">Others</label>

                            </div>
                        </div>
                        @error('options[]')
                                <div class="input_error">{{ $message }}</div>
                        @enderror

                        <div style="margin-bottom: 50px;"></div>
                        <div class="col-md-12">

                            <div class="form-group">
                                <input type="text" name="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name*">
                            </div>
                            @error('name')
                                <div class="input_error">{{ $message }}</div>
                            @enderror
                            <br>
                            <div class="form-group">
                                <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email id*">
                            </div>
                            @error('email')
                                <div class="input_error">{{ $message }}</div>
                            @enderror
                            <br>

                            <div class="popup-country-code">
                                <input  id="phone10"  type="tel" required name="phone" required="required" />

                            </div>
                            @error('phone')
                                <div class="input_error">{{ $message }}</div>
                            @enderror
                            <br>

                            <div class="form-group">
                                <input type="text" name="location" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Location">
                            </div>
                            @error('location')
                                <div class="input_error">{{ $message }}</div>
                            @enderror
                            <br>

                            <div class="form-group">
                                <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3" placeholder="Note"></textarea>
                            </div>
                            @error('note')
                                <div class="input_error">{{ $message }}</div>
                            @enderror
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>


