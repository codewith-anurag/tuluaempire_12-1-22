<div class="row">
         <div class="col-md-12">
            <div class="contact-from">
               <div class="section-title">
                  <!-- <h5>Contact Us</h5> -->
                  <h2>Keep in touch</h2>
               </div>
               <!-- section title -->
               <div class="main-form pt-45">
                  <form id="contact-form" action="test.php" method="post" data-toggle="validator" novalidate="true">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="singel-form form-group has-error has-danger">
                              <input name="name" type="text" placeholder="Your name*" data-error="Name is required." required="required">
                              <!-- <div class="help-block with-errors"><ul class="list-unstyled"><li>Name is required.</li></ul></div> -->
                           </div>
                           <!-- singel form -->
                        </div>
                        <div class="col-md-6">
                           <div class="singel-form form-group">
                              <input name="email" type="email" placeholder="Email*" data-error="Valid email is required." required="required">
                              <div class="help-block with-errors"></div>
                           </div>
                           <!-- singel form -->
                        </div>
                        <div class="col-md-12 contact-code">
                           <input id="phonewater" type="tel" name="phone" required="required" />
                        </div>
                        <div class="col-md-12">
                           <div class="singel-form form-group">
                              <textarea name="messege" placeholder="Messege*" data-error="Please,leave us a message." required="required"></textarea>
                              <div class="help-block with-errors"></div>
                           </div>
                           <!-- singel form -->
                        </div>
                        <p class="form-message"></p>
                        <div class="col-md-12">
                           <div class="singel-form">
                              <button type="submit" class="main-btn disabled">Send</button>
                           </div>
                           <!-- singel form -->
                        </div>
                     </div>
                     <!-- row -->
                  </form>
               </div>
               <!-- main form -->
            </div>
         </div>
      </div>