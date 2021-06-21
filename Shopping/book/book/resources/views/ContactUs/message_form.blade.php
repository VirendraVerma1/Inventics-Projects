<div class="col-sm-9">
            <div class="title-wrap">
              <h2 class="h1-style">Get In Touch With Us</h2>
              <div>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally in which toil and pain</div>
            </div>
            <!-- <form action="{{route('save_msg_from_contactUs')}}" method="POST" data-toggle="validator" class="contact-form" id="contactForm"> -->
            <form action="{{route('save_msg_from_contactUs')}}" method="POST" >
            @csrf()
              <div class="form-confirm">
                <!-- <div class="success-confirm">
                  Thanks! Your message has been sent. We will get back to you soon!
                </div>
                <div class="error-confirm">
                  Oops! There was an error submitting form. Refresh and send again.
                </div> -->
              </div>
              <div class="form-group">
                <div class="row vert-margin-middle">
                  <div class="col-lg">
                    <input type="text" name="firstname" class="form-control form-control--sm" placeholder="Name" required>
                  </div>
                  <div class="col-lg">
                    <input type="text" name="lastName" class="form-control form-control--sm" placeholder="Last Name" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row vert-margin-middle">
                  <div class="col-lg">
                    <input type="text" name="email" class="form-control form-control--sm" placeholder="Email" required>
                  </div>
                  <div class="col-lg">
                    <input type="text" name="phone" class="form-control form-control--sm" placeholder="Phone" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control--sm " name="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control form-control--sm textarea--height-200" name="message" placeholder="Message" required></textarea>
              </div>
              <button class="btn" type="submit">Send Message</button>
            </form>
          </div>