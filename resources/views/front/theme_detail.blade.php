@extends('front.layouts.app')
@section('content')
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url({{asset('front/img/page-banner-1.jpg')}})"></section>
<section class="pt-120 pb-10 gray-bg">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-10 offset-md-1">
            <h2> {{$theme_title}} </h2>
         </div>
      </div>
   </div>
</section>
@if(!empty($subthemes))
    @foreach ($subthemes as $subthemes_list)
		<section id="{{$subthemes_list->subtheme_slug}}" class="pt-30 pb-50 gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10">
						<div class="singel-course mt-30">
							<div class="row no-gutters">
								<div class="col-md-6">
									<div class="thum">
										<div class="image">
										<img src="{{asset('subtheme_image/'.$subthemes_list->image)}}" alt="Course">
										</div>
									</div>
								</div>
								<div class="col-md-6 scro">
									<div class="cont">
										<a href="#">
										<h4>{{$subthemes_list->title}}</h4>
										</a>
										<div class="course-teacher">

										{!! $subthemes_list->description !!}
										</div>
									</div>
								</div>
							</div>						
						</div>						
					</div>
					<div class="col-lg-1"></div>
				</div>
			</div>
		</section>
	@endforeach
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="contact-from">
              <div class="section-title">
                 <!-- <h5>Contact Us</h5> -->
                 <h2>Keep in touch</h2>
              </div>
              <!-- section title -->
              <div class="main-form pt-45">
                <form id="contact-form" action="{{url('send_contactus')}}" method="post" data-toggle="validator" novalidate="true">
                    @csrf
                    <div class="row">
                       <div class="col-md-6">
                          <div class="singel-form form-group has-error has-danger">
                             <input name="name" type="text" placeholder="Your name*" data-error="Name is required." required="required">                             
                          </div>                          
                       </div>
                       <div class="col-md-6">
                          <div class="singel-form form-group">
                             <input name="email" type="email" placeholder="Email*" data-error="Valid email is required." required="required">
                             <div class="help-block with-errors"></div>
                          </div>                          
                       </div>
                       <div class="col-md-12 contact-code">
                          <input id="phonewater" type="tel" name="phone" required="required" />
                       </div>
                       <div class="col-md-12">
                          <div class="singel-form form-group">
                             <textarea name="messege" placeholder="Messege*" data-error="Please,leave us a message." required="required"></textarea>
                             <div class="help-block with-errors"></div>
                          </div>                          
                       </div>
                       <p class="form-message"></p>
                       <div class="col-md-12">
                          <div class="singel-form">
                             <button type="submit" class="main-btn disabled">Send</button>
                          </div>                          
                       </div>
                    </div>                    
                 </form>
              </div>              
           </div>
        </div>
     </div>
   </div>
</section>
<div class="hidden-xs wave__footer">
   <div class="wave__ft1"></div>
</div>
@endsection
