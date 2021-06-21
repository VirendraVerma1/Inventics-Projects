<div class="holder">
      <div class="container">
        <!-- Page Title -->
        <div class="page-title text-center">
          <h1>FAQ’S</h1>
        </div>
        <!-- /Page Title -->
        <div class="row justify-content-center">
          <div class="col-lg-18 col-xl-12">
            <div class="faq-item-wrap">
            @foreach($faqs as $faq)
            
              <div class="faq-item">
                <h3 class="faq-item-title">{{$faq->question}}</h3>
                <div class="faq-item-content">
                  <p>{!! $faq->answer !!}</p>
                  <!-- <p>Express orders placed before 2pm will be dispatched the same day.
                    Standard shipping tends to take between 2-3 days within the United Kingdom.</p>
                  <p>We can also ship to many parts of the globe in just a few days. Please refer to our ‘International shipping’ page for more details.</p> -->
                </div>
              </div>
            @endforeach
              <!-- <div class="faq-item">
                <h3 class="faq-item-title">Can i add a gift message?</h3>
                <div class="faq-item-content">
                  <p>Absolutely! We are rather proud of our gift notes and adding a gift note is simple. It will be printed onto a luxurious, high-quality gift card. (Just make sure you include who it is from– unless you want it to be a surprise).</p>
                </div>
              </div>
              <div class="faq-item">
                <h3 class="faq-item-title">Do you include receipts in the box</h3>
                <div class="faq-item-content">
                  <p>Absolutely! We are rather proud of our gift notes and adding a gift note is simple. It will be printed onto a luxurious, high-quality gift card. (Just make sure you include who it is from– unless you want it to be a surprise).</p>
                </div>
              </div>
              <div class="faq-item">
                <h3 class="faq-item-title">Do you offer a corporate or bulk rate?</h3>
                <div class="faq-item-content">
                  <p>Our corporate team can help you find the perfect present. Whether you want to thank and reward your employees, or send a gift to a client, we can meet your requirements. From our wide range of hampers and gifts sets & personalised gifts and subscriptions, we're sure you'll find something you love.</p>
                  <p>If you want to add a personal touch to your gift, our studio can incorporate your logo and messaging into your gift. All orders come beautifully gift wrapped in our signature packaging.</p>
                  <p>Please get in touch with <a href="mailto:FOXshop@gmail.com"><strong>FOXshop@gmail.com</strong></a> or call us on <a href="tel:+388005553535"><strong>+3 8 800 555 35 35</strong></a></p>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  