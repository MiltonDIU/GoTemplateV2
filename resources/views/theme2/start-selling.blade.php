@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="public/assets/theme2/css/start-selling.css">
@endpush

@section('content')

  <!-- selling banner start -->
  <section id="selling_banner">
    <div class="container">
      <h1 class="page_banner_title">Become an Author and Sell on GoTemplate</h1>
      <h2 class="page_banner_description">Simple Application Process</h2>

      <div class="sale_page_button">
        <a href="{{ url('/register') }}">Become our Premium Member</a>
      </div>
    </div>
  </section>
  <!-- selling banner end -->


  <!-- benefit part start -->
  <section id="benefit">
    <div class="container">

      <h3 class="sale_title_small">How Can You Benefit With Gotemplate</h3>

      <div class="benefit_main">
        <div class="row">
          <div class="col-lg-4">
            <div class="benefit_details">
              <div class="benefit_points">
                <i class="fas fa-check"></i>
                <p>Network of 1.5 million members</p>
              </div>
              <div class="benefit_points">
                <i class="fas fa-check"></i>
                <p>Simple product approval system</p>
              </div>
              <div class="benefit_points">
                <i class="fas fa-check"></i>
                <p>24x7 technical support</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="benefit_points">
              <i class="fas fa-check"></i>
              <p>Set your own prices</p>
            </div>
            <div class="benefit_points">
              <i class="fas fa-check"></i>
              <p>High Commission rates</p>
            </div>
            <div class="benefit_points">
              <i class="fas fa-check"></i>
              <p>Affiliation program</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="benefit_points">
              <i class="fas fa-check"></i>
              <p>Transparent & clear payout system</p>
            </div>
            <div class="benefit_points">
              <i class="fas fa-check"></i>
              <p>Huge community support</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- benefit part end -->


  <!-- become vendor start -->
  <section id="become_vendor">
    <div class="container">
      <h4 class="sale_title_big">Become an Vendor in GoTemplate</h4>

      <div class="become_vendor_details">
        <p class="sale_page_details">
          Online content is getting popular really fast. This is an opportunity 
          for students, teachers and all kinds of professionals. Professionals 
          can take this opportunity to share their knowledge, skills and expertise 
          with others. GoTemplate provides all skilled people with an online 
          platform and all the necessary support to get started with this trend 
          and become successful.
        </p>
      </div>

      <div class="sale_page_button">
        <a href="{{ url('/register') }}">Join GoTemplate Today</a>
      </div>
    </div>
  </section>
  <!-- become vendor end -->


  <!-- payment breakdown start-->
  <section id="payment_breakdown">
    <div class="container">
      <h4 class="sale_title_big">Payment Breakdown</h4>

      <!-- table start -->
      <div class="table-responsive">
        <table class="table payment_table">
          <thead>
            <tr>
              <th scope="col">Vendor Type</th>
              <th scope="col">Default Vendor Commission (%)</th>
              <th scope="col">GoTemplate Commission (%)</th>
              <th scope="col">Govt. Vat deducted in each sale from vendor account (%)</th>
              <th scope="col">Total Cut from Vendor Account on each sale (%)</th>
              <th scope="col">Real Earnings of Vendor on each Sale (%)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Exclusive</th>
              <td>90</td>
              <td>10</td>
              <td>15</td>
              <td>25</td>
              <td>75</td>
            </tr>
            <tr class="last_col">
              <th scope="row">Non Exclusive</th>
              <td>70</td>
              <td>30</td>
              <td>15</td>
              <td>45</td>
              <td>55</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- table end -->

    </div>
  </section>
  <!-- payment breakdown end-->


  <!-- sale item start -->
  <section id="sale_items">

    <div class="container">
      <h3 class="sale_title_small">What Can You Sell on GoTemplate?</h3>
      <h4 class="sale_title_big">Everything That’s Creative and Can be Delivered Digitally</h4>

      <div class="sale_items_details">
        <p class="sale_page_details">We accept multiple product types and continuously grow the marketplace. Check the technologies that are now in stock or send us a request if you would like to sell something completely new on GoTemplate.</p>
      </div>
    </div>

    <div class="sale_item_main">
      <div class="container">
        <div class="row">

          <div class="col-lg-4">
            <div class="sale_item_box">
              <h5 class="sale_item_title">Website Templates</h5>
              <p class="sale_item_text">
                Become an author on GoTemplate and sell WordPress, WooCommerce, Joomla, Drupal, HTML, Bootstrap, 
                Admin templates, Shopify, Opencart, Magento, PrestaShop templates, and much more. 
                Your website templates will show off on our top category pages, receive sustainable 
                traffic and sales.
              </p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="sale_item_box">
              <h5 class="sale_item_title">Plugins</h5>
              <p class="sale_item_text">
                Created a plugin and want to share it with others? Make an upload through your author account 
                and sell it on TemplateMonster digital marketplace. At the moment, we feature WordPress Plugins, 
                PrestaShop Modules, Magento Extensions, JavaScript elements, and are open for new niches and 
                suggestions.
              </p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="sale_item_box">
              <h5 class="sale_item_title">Presentation</h5>
              <p class="sale_item_text">
                Are you a talented graphic designer? The digital marketplace is a perfect way to share the 
                best works in your portfolio and sell them independently. Your logo design, fonts, CV templates, 
                certificate designs, illustrations, and other graphics can appear on TemplateMonster shortly.
              </p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="sale_item_box">
              <h5 class="sale_item_title">Graphics</h5>
              <p class="sale_item_text">
                Presentation templates are a great way for web and graphic designers to present their 
                skills to the world. Be it PowerPoint, Keynote, or Google Slides format, feel free to submit 
                your design, and let's see it in the listings.
              </p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="sale_item_box">
              <h5 class="sale_item_title">Audios and Videos</h5>
              <p class="sale_item_text">
                Have you made lots of stock video and audio files? Rest assured that you're sitting on a 
                gold mine that will bring you a great passive income. Upload your stock media right now and 
                start making a fortune.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- sale item end -->


  <!-- apply vendor start -->
  <section id="apply_vendor">
    <div class="container">
      <h3 class="sale_title_small">How Can You Benefit With Gotemplate</h3>
      <h4 class="sale_title_big">Become an Vendor in GoTemplate</h4>

      <p class="sale_page_details">Online content is getting popular really fast. This is an opportunity for students, teachers and all kinds of professionals. Professionals can take this opportunity to share their knowledge, skills and expertise with others. GoTemplate provides all skilled people with an online platform and all the necessary support to get started with this trend and become successful.</p>
    </div>

    <div class="apply_steps">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="steps_main">
              <p class="step_number">1</p>
              <p class="steps_details">Complete your registration as a vendor</p>
            </div>
          </div>

          <div class="col">
            <div class="steps_main">
              <p class="steps_details">Log in to your account and upload your product</p>
              <p class="step_number">2</p>
            </div>
          </div>

          <div class="col">
            <div class="steps_main">
              <p class="steps_details">Submit your request for product upload by filling out details.</p>
              <p class="step_number">3</p>
            </div>
          </div>

          <div class="col">
            <div class="steps_main">
              <p class="steps_details">Our system will review your product and publish after review</p>
              <p class="step_number">4</p>
            </div>
          </div>

          <div class="col">
            <div class="steps_main">
              <p class="steps_details">See your product online and start making sales!</p>
              <p class="step_number">5</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- apply vendor end -->


  <!-- vendor trait start -->
  <section id="vendor_trait">

    <div class="container">
      <h3 class="sale_title_small">What Should Be The Characteristics Of A Vendor?</h3>
      <h4 class="sale_title_big">Vendor Traits Of GoTemplate</h4>

      <p class="sale_page_details">To become a Vendor in GoTemplate is easy. Just make sure you have the following traits so that you can achieve success easily:</p>
    </div>


    <div class="vendor_trait_main">
      <div class="container">
        <div class="row">

          <div class="col-lg-3">
            <div class="sale_item_box">
              <h5 class="sale_item_title">Passionate</h5>
              <p class="sale_item_text">
                Have you made lots of stock video and audio files? Rest assured that you're sitting on 
                a gold mine that will bring you a great passive income. Upload your stock media right 
                now and start making a fortune.
              </p>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="sale_item_box">
              <h5 class="sale_item_title">Facilitators</h5>
              <p class="sale_item_text">
                Have you made lots of stock video and audio files? Rest assured that you're sitting on a 
                gold mine that will bring you a great passive income. Upload your stock media right now 
                and start making a fortune.
              </p>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="sale_item_box">
              <h5 class="sale_item_title">Open Minded</h5>
              <p class="sale_item_text">
                Have you made lots of stock video and audio files? Rest assured 
                that you're sitting on a gold mine that will bring you a great passive income. 
                Upload your stock media right now and start making a fortune.
              </p>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="sale_item_box">
              <h5 class="sale_item_title">Willing to work as outsource</h5>
              <p class="sale_item_text">
                Have you made lots of stock video and audio files? Rest assured that you're sitting on 
                a gold mine that will bring you a great passive income. Upload your stock media right 
                now and start making a fortune.
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- vendor trait end -->


  <!-- vendor agreement start-->
  <section id="vendor_agreement">
    <div class="container">
      <h4 class="sale_title_big">Vendor Agreement</h4>
      <p class="sale_page_details">Vendors will have the ownership of their contents and we will only keep the contents in our platform as long as the Vendors allow us. We will ensure that the Vendors receive royalty per sell of their contents. The percentage of the royalty will depend on the amount of support the Vendors will require from our end. Vendors will be allowed to market their contents by themselves to increase the sale and increase the payment as royalty. We will also have our own dedicated team which will market the contents in different social media platforms. Vendors can produce their own video. Note that the sale of the content may depend on the quality of the video and audio. However, it will decrease the royalty percentage. It is because we need to pay the supporting team for their work.</p>
    </div>
  </section>
  <!-- vendor agreement end-->


  <!-- vendor payment start -->
  <section id="vendor_payment">
    <div class="container">
      <h4 class="sale_title_big">Vendor Payment Policy</h4>
      <p class="sale_page_details">Depending on how independent the Vendor is in terms of content production, GoTemplate offers different types of payment.</p>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-7 m-auto">
          <div class="payment_policy">
            <div class="payment_policy_text">
              <i class="fas fa-check"></i>
              <p>The Vendor gets a royalty (up to maximum 70%) for each content sold from GoTemplate.</p>
            </div>

            <div class="payment_policy_text">
              <i class="fas fa-check"></i>
              <p>This payment can be withdrawn to a bank account or by cheque.</p>
            </div>

            <div class="payment_policy_text">
              <i class="fas fa-check"></i>
              <p>Vendors will be paid upon reaching a payment threshold as decided during the time of agreement with GoTemplate</p>
            </div>

            <div class="payment_policy_text">
              <i class="fas fa-check"></i>
              <p>Vendor success is the success of GoTemplate and, therefore, GoTemplate will help Vendors to successfully reach their payment threshold as quickly as possible.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- vendor payment end -->


  <!-- next level start -->
  <section id="next_level">
    <div class="container">
      <h4 class="sale_title_big">Take Your Passion To The Next Level</h4>
      <p class="sale_page_details">Become part of an inspiring, talented community of creatives, and make a living doing what you love.</p>

      <div class="sale_page_button">
        <a href="{{ url('/register') }}">Sign up Now</a>
      </div>
    </div>
  </section>
  <!-- next level end -->
@endsection