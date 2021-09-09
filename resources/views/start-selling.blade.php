@if($allsettings->maintenance_mode == 0)
@include('version')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ Helper::translation(3018,$translate) }} - {{ $allsettings->site_title }}</title>
    @include('stylesheet')
</head>

<body class="preload term-condition-page start-selling">

    @include('header')

    <!-- start hero section -->
    <section class="hero-area bgimage">
        <div class="bg_image_holder">
            <img src="{{ url('/') }}/public/assets/images/start-selling1.jpg" alt="{{ $allsettings->site_title }}">
        </div>
        <div class="bg-overlay"></div>

        <!-- start hero-content -->
        <div class="hero-content content_above">
            <!-- start .contact_wrapper -->
            <div class="content-wrapper">
                <!-- start .container -->
                <div class="container">
                    <!-- start row -->
                    <div class="row">
                        <!-- start col-md-12 -->
                        <div class="col-md-12">
                            <div class="hero__content__title">
                                <h1><span class="bold">Become an Author and Sell on GoTemplate</span></h1>
                                <p class="tagline">Simple Application Process</p>
                                <a href="{{ url('/register') }}" class="register-btn btn btn-lg btn--icon btn-ss btn-secondary md-login bg-red-primary">
                                    Become A GoTemplate Author Today
                                </a>
                            </div>
                        </div>
                        <!-- end /.col-md-12 -->
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.container -->
            </div>
            <!-- end .contact_wrapper -->
        </div>
        <!-- end hero-content -->
    </section>
    <!-- end hero section -->


    <!-- start how you can benefit [UPDATED] -->
    <section class="benefit">
        <div class="container">
            <h3>How You Can Benefit with GoTemplate</h3>
            <h1 class="my-2">Become an Vendor in GoTemplate</h1>
            <p style="margin-bottom: 30px">
                Online content is getting popular really fast. This is an opportunity for students, 
                teachers and all kinds of professionals. Professionals can take this opportunity to 
                share their knowledge, skills and expertise with others. GoTemplate provides all 
                skilled people with an online platform and all the necessary support to get started 
                with this trend and become successful.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-users"></i></p>
                        <p class="item-text-wrapper">Network of 1.5 million members</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-check-square"></i></p>
                        <p class="item-text-wrapper">Simple product approval system</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-money"></i></p>
                        <p class="item-text-wrapper">Set your own prices</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-percent"></i></p>
                        <p class="item-text-wrapper">High Commission rates</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-credit-card"></i></p>
                        <p class="item-text-wrapper">Transparent &amp; clear payout system</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-universal-access"></i></p>
                        <p class="item-text-wrapper">Huge community support</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-support"></i></p>
                        <p class="item-text-wrapper">24x7 technical support</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-handshake-o"></i></p>
                        <p class="item-text-wrapper">Affiliation program</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end how you can benefit [UPDATED] -->


    <!-- start vendor payment breakdown -->
    <section class="community py-5 ash-bg">
        <div class="container">
            <h1 class="mt-2 mb-4">Payment Breakdown</h1>
            
            <table class="table-bordered">
                <tr>
                    <th class="p-1">Vendor Type</th>
                    <th class="p-1">Default Vendor Commision (%)</th>
                    <th class="p-1">GoTemplate Commision (%)</th>
                    <th class="p-1">Govt. Vat will deducted in each sale from vendor account (%)</th>
                    <th class="p-1">Total Cut from Vendor Account on each sale (%)</th>
                    <th class="p-1">Real Earnings of Vendor on each Sale (%)</th>
                </tr>
    
                <tr>
                    <td class="p-1">Exclusive</td>
                    <td class="p-1">90</td>
                    <td class="p-1">10</td>
                    <td class="p-1">15</td>
                    <td class="p-1"><strong>25</strong></td>
                    <td class="p-1"><strong>75</strong></td>
                </tr>

                <tr>
                    <td class="p-1">Non Exclusive</td>
                    <td class="p-1">70</td>
                    <td class="p-1">30</td>
                    <td class="p-1">15</td>
                    <td class="p-1"><strong>45</strong></td>
                    <td class="p-1"><strong>55</strong></td>
                </tr>
            </table>
        </div>
    </section>
    <!-- end vendor payment breakdown -->


    <!-- start how you can benefit -->
    <!--
    <section class="benefit">
        <div class="container">
            <h3>How You Can Benefit with GoTemplate</h3>
            <h1 class="my-2">More Ways to Earn While Doing What You Love</h1>
            <p style="margin-bottom: 30px">
                Being the first world theme author since 2002, we know everything about digital product selling.
                That's why the GoTemplate digital marketplace is a great place for designers, developers, and
                studios to reach highly relevant clients and showcase their works to the world.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-users"></i></p>
                        <p class="item-text-wrapper">Network of 1.5 million members</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-check-square"></i></p>
                        <p class="item-text-wrapper">Simple product approval system</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-money"></i></p>
                        <p class="item-text-wrapper">Set your own prices</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-percent"></i></p>
                        <p class="item-text-wrapper">High Commission rates</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-credit-card"></i></p>
                        <p class="item-text-wrapper">Transparent &amp; clear payout system</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-universal-access"></i></p>
                        <p class="item-text-wrapper">Huge community support</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-support"></i></p>
                        <p class="item-text-wrapper">24x7 technical support</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 my-4 white-bg">
                    <div class="item-container">
                        <p class="item-icon white-bg"><i class="fa fa-handshake-o"></i></p>
                        <p class="item-text-wrapper">Affiliation program</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- end how you can benefit -->


    <!-- start what you can sell -->
    <section class="products-sell">
        <div class="container">
            <h3>What Can You Sell on GoTemplate?</h3>
            <h1 class="my-2">Everything That’s Creative and Can be Delivered Digitally</h1>
            <p style="margin-bottom: 30px">
                We accept multiple product types and continuously grow the marketplace.
                Check the technologies that are now in stock or send us a request if you would
                like to sell something completely new on GoTemplate.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 card border-none">
                    <div class="item-container height-full">
                        <p class="item-icon white-bg"><i class="fa fa-desktop"></i></p>
                        <div class="item-text-wrapper py-1 px-3">
                            <h3 class="item-title">Website Templates</h3>
                            <p class="item-text">
                                Become an author on TemplateMonster and sell WordPress, WooCommerce, Joomla, Drupal,
                                HTML, Bootstrap, Admin templates, Shopify, Opencart, Magento, PrestaShop templates,
                                and much more. Your website templates will show off on our top category pages,
                                receive sustainable traffic and sales.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 card border-none">
                    <div class="item-container height-full">
                        <p class="item-icon white-bg"><i class="fa fa-cogs"></i></p>
                        <div class="item-text-wrapper py-1 px-3">
                            <h3 class="item-title">Plugins</h3>
                            <p class="item-text">
                                Created a plugin and want to share it with others? Make an upload through your author
                                account and sell it on TemplateMonster digital marketplace. At the moment, we feature
                                WordPress Plugins, PrestaShop Modules, Magento Extensions, JavaScript elements,
                                and are open for new niches and suggestions.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 card border-none">
                    <div class="item-container height-full">
                        <p class="item-icon white-bg"><i class="fa fa-file-powerpoint-o"></i></p>
                        <div class="item-text-wrapper py-1 px-3">
                            <h3 class="item-title">Presentation</h3>
                            <p class="item-text">
                                Presentation templates are a great way for web and graphic designers to present
                                their skills to the world. Be it PowerPoint, Keynote, or Google Slides format,
                                feel free to submit your design, and let's see it in the listings.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 card border-none">
                    <div class="item-container height-full">
                        <p class="item-icon white-bg"><i class="fa fa-pencil-square"></i></p>
                        <div class="item-text-wrapper py-1 px-3">
                            <h3 class="item-title">Graphic Design</h3>
                            <p class="item-text">
                                Are you a talented graphic designer? The digital marketplace is a perfect way to share
                                the best works in your portfolio and sell them independently. Your logo design, fonts,
                                CV templates, certificate designs, illustrations, and other graphics can appear on
                                TemplateMonster shortly.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 card border-none">
                    <div class="item-container height-full">
                        <p class="item-icon white-bg"><i class="fa fa-file-video-o"></i></p>
                        <div class="item-text-wrapper py-1 px-3">
                            <h3 class="item-title">Audios and Videos</h3>
                            <p class="item-text">
                                Have you made lots of stock video and audio files? Rest assured that you're
                                sitting on a gold mine that will bring you a great passive income.
                                Upload your stock media right now and start making a fortune.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end what you can sell -->


    <!-- start become an author [UPDATE] -->
    <section class="become-author ash-bg py-5">
        <div class="container">
            <h3>How can you become a Vendor?</h3>
            <h1 class="my-2">Apply as an Vendor in GoTemplate</h1>
            <p style="margin-bottom: 30px">
                Online content is getting popular really fast. This is an opportunity for students, teachers and all 
                kinds of professionals. Professionals can take this opportunity to share their knowledge, skills and 
                expertise with others. GoTemplate provides all skilled people with an online platform and all the 
                necessary support to get started with this trend and become successful.
            </p>

            <div class="row justify-content-center">
                <!-- <div class="col-lg-6 col-md-12 col-sm-12 px-2 py-3 mb-3">
                    <div class="video-player">
                        <span class="custom-yt-btn">
                            <span class="play-icon"></span>
                        </span>
                    </div>
                </div> -->

                <div class="row justify-content-center col-lg-12 col-md-12 col-sm-12 mb-3">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 card border-none ash-bg">
                        <div class="item-container height-full">
                            <p class="step">1</p>
                            <p class="item-icon ash-bg"><i class="fa fa-user-plus"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    Complete your registration as a vendor
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 card border-none ash-bg">
                        <div class="item-container height-full">
                            <p class="step">2</p>
                            <p class="item-icon ash-bg"><i class="fa fa-sign-in"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    Log in to your account and upload your product
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 my-4 card border-none ash-bg">
                        <div class="item-container height-full">
                            <p class="step">3</p>
                            <p class="item-icon ash-bg"><i class="fa fa-info"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    Set your profile with necessary information.
                                </p>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 card border-none ash-bg">
                        <div class="item-container height-full">
                            <p class="step">3</p>
                            <p class="item-icon ash-bg"><i class="fa fa-upload"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    Submit your request for product upload by filling out details.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 card border-none ash-bg">
                        <div class="item-container height-full">
                            <p class="step">4</p>
                            <p class="item-icon ash-bg"><i class="fa fa-check-square"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    Our system will review your product and publish after review
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 card border-none ash-bg">
                        <div class="item-container height-full">
                            <p class="step">5</p>
                            <p class="item-icon ash-bg"><i class="fa fa-share"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    See your product online and start making sales!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end become an author [UPDATE] -->


    <!-- start become an author -->
    <!--
    <section class="become-author white-bg">
        <div class="container">
            <h3>How can you become an Author?</h3>
            <h1 class="my-2">Simple Application Process</h1>
            <p style="margin-bottom: 30px">
                Being the first world theme author since 2002, we know everything about digital product selling.
                That's why the GoTemplate digital marketplace is a great place for designers, developers,
                and studios to reach highly relevant clients and showcase their works to the world.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-12 col-sm-12 px-2 py-3 mb-3">
                    <div class="video-player">
                        <span class="custom-yt-btn">
                            <span class="play-icon"></span>
                        </span>
                    </div>
                </div>

                <div class="row justify-content-center col-lg-6 col-md-12 col-sm-12 mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 my-4 card border-none white-bg">
                        <div class="item-container height-full">
                            <p class="step">1</p>
                            <p class="item-icon white-bg"><i class="fa fa-user-plus"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    Create and verify a user account.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 my-4 card border-none white-bg">
                        <div class="item-container height-full">
                            <p class="step">2</p>
                            <p class="item-icon white-bg"><i class="fa fa-sign-in"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    Log in to your account and go to “Start Selling” page.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 my-4 card border-none white-bg">
                        <div class="item-container height-full">
                            <p class="step">3</p>
                            <p class="item-icon white-bg"><i class="fa fa-info"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    Set your profile with necessary information.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 my-4 card border-none white-bg">
                        <div class="item-container height-full">
                            <p class="step">4</p>
                            <p class="item-icon white-bg"><i class="fa fa-upload"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    Upload your project by filling out details.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 my-4 card border-none white-bg">
                        <div class="item-container height-full">
                            <p class="step">5</p>
                            <p class="item-icon white-bg"><i class="fa fa-check-square"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    We will manually review the product and notify you.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 my-4 card border-none white-bg">
                        <div class="item-container height-full">
                            <p class="step">6</p>
                            <p class="item-icon white-bg"><i class="fa fa-share"></i></p>
                            <div class="item-text-wrapper pb-1 px-3">
                                <p class="item-text">
                                    See your product online and start making sales!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- end become an author -->


    <!-- start community -->
    <!-- <section class="community ash-bg py-5">
        <div class="container">
            <h3>What Community Says about the Marketplace</h3>
            <h1 class="my-2">Honest Community Reviews About GoTemplate</h1>
            <p style="margin-bottom: 30px">
                Being the first world theme author since 2002, we know everything about digital product selling.
                That's why the GoTemplate digital marketplace is a great place for designers, developers, and
                studios to reach highly relevant clients and showcase their works to the world.
            </p>

            <div class="row justify-content-center">

                @for($i = 0; $i < 6; $i++)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 my-5">
                        <div class="item-container height-full">
                            <div class="avatar-container ash-bg">
                                <img class="item-avatar" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Beckswimbledon.jpg/800px-Beckswimbledon.jpg" alt="Community Avatar">
                            </div>
                            <blockquote class="item-text-wrapper custom-blockquote">
                                <p style="margin-top: 20px;" class="px-2 pb-3">
                                    Lorem ipsum dolor sit amet consectetur ametkit adipisicing elit.
                                    Aperiam, ipsum sapiente quis elit aspernatur libero repellat quis consequatur liber
                                    ducimus quam nisi exercitationem.
                                </p>
                                <span class="mr-3 mb-3 reviewer">&ndash; David Beckham</span>
                            </blockquote>
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </section> -->
    <!-- end community -->

    <!-- start vendor traits -->
    <section class="community white-bg">
        <div class="container">
            <h3>What Should Be The Characteristics Of A Vendor?</h3>
            <h1 class="my-2">Vendor Traits Of GoTemplate</h1>
            <p style="margin-bottom: 30px">
                To become a Vendor in GoTemplate is easy. Just make sure you have the following traits 
                so that you can achieve success easily:
            </p>

            <div class="row justify-content-center col-lg-12 col-md-12 col-sm-12 mb-3">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 white-bg card border-none">
                    <div class="item-container height-full">
                        <p class="step">1</p>
                        <div class="item-text-wrapper pb-1 px-3 mt-3">
                            <h6>Passionate</h6>
                            <p class="item-text">
                                The Vendors should be passionate about their contents and should have up to date knowledge 
                                about the market which they will upload.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 white-bg card border-none">
                    <div class="item-container height-full">
                        <p class="step">2</p>
                        <div class="item-text-wrapper pb-1 px-3 mt-3">
                            <h6>Facilitators</h6>
                            <p class="item-text">
                                The Vendors will facilitate the customers to achieve their needs by ensuring that 
                                their contents provide all the necessary tasks.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 white-bg card border-none">
                    <div class="item-container height-full">
                        <p class="step">3</p>
                        <div class="item-text-wrapper pb-1 px-3 mt-3">
                            <h6>Open Minded</h6>
                            <p class="item-text">
                                Vendors are expected to be open-minded and willing to learn from the working team of GoTemplate. 
                                This is necessary to ensure the quality of the contents.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 my-4 white-bg card border-none">
                    <div class="item-container height-full">
                        <p class="step">4</p>
                        <div class="item-text-wrapper pb-1 px-3 mt-3">
                            <h6>Willing to work as outsource</h6>
                            <p class="item-text">
                                Vendors are expected to be willing to work on their contents based on the need of the customers. 
                                They need to be positive to work as per the request of the client if needed with a separate contract.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end vendor traits -->
    

    <!-- start vendor agreement -->
    <section class="community py-5 ash-bg">
        <div class="container">
            <h1 class="my-2">Vendor Agreement</h1>
            <p style="margin-bottom: 30px">
                Vendors will have the ownership of their contents and we will only keep the contents 
                in our platform as long as the Vendors allow us. We will ensure that the Vendors 
                receive royalty per sell of their contents. The percentage of the royalty will 
                depend on the amount of support the Vendors will require from our end. 
                Vendors will be allowed to market their contents  by themselves to increase the sale 
                and increase the payment as royalty. We will also have our own dedicated team which 
                will market the contents in different social media platforms.
                Vendors can produce their own video. Note that the sale of the content may depend on 
                the quality of the video and audio. However, it will decrease the royalty percentage. 
                It is because we need to pay the supporting team for their work.
            </p>
        </div>
    </section>
    <!-- end vendor agreement -->
    
    
    <!-- start vendor payment policy -->
    <section class="community pb-5 white-bg">
        <div class="container d-flex flex-column-center">
            <h1 class="my-2">Vendor Payment Policy</h1>
            <p>
                Depending on how independent the Vendor is in terms of content production, GoTemplate offers different types of payment.
            </p>
            <ul class="text-left">
                <li>The Vendor gets a royalty (up to maximum 70%) for each content sold from GoTemplate.</li>
                <li>This payment can be withdrawn to a bank account or by cheque.</li>
                <li>Vendors will be paid upon reaching a payment threshold as decided during the time of agreement with GoTemplate.</li>
                <li>Vendor success is the success of GoTemplate and, therefore, GoTemplate will help Vendors to successfully reach their payment threshold as quickly as possible.</li>
            </ul>
        </div>
    </section>
    <!-- end vendor payment policy -->
    

    <!--
    <section class="why_choose">
        <div class="container">

            <div class="row border-bottom features mt-3 mb-3 pt-3 pb-3">
                <div class="col-lg-6 col-md-6 mt-3 mb-3 pt-3 pb-3 right-border border-data">
                    <div class="icon">
                        @if($setting['setting']->box1_icon != '')
                            <img
                                src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box1_icon }}"
                                alt="{{ $setting['setting']->box1_title }}"
                                class="img-fluid icon-img"
                            >
                        @endif
                    </div>

                    <div class="info">
                        <h3 class="pt-0">{{ $setting['setting']->box1_title }}</h3>
                        <p class="no-margin">{!! nl2br($setting['setting']->box1_text) !!}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-3 mb-3 pt-3 pb-3 border-data">
                    <div class="icon">
                        @if($setting['setting']->box2_icon != '')
                            <img
                                src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box2_icon }}"
                                alt="{{ $setting['setting']->box2_title }}"
                                class="img-fluid icon-img"
                            >
                        @endif
                    </div>

                    <div class="info">
                        <h3 class="pt-0">{{ $setting['setting']->box2_title }}</h3>
                        <p class="no-margin">{!! nl2br($setting['setting']->box2_text) !!}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-3 mb-3 pt-3 pb-3 right-border">
                    <div class="icon">
                        @if($setting['setting']->box3_icon != '')
                            <img
                                src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box3_icon }}"
                                alt="{{ $setting['setting']->box3_title }}"
                                class="img-fluid icon-img"
                            >
                        @endif
                    </div>

                    <div class="info">
                        <h3 class="pt-0">{{ $setting['setting']->box3_title }}</h3>
                        <p class="no-margin">{!! nl2br($setting['setting']->box3_text) !!}</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-3 mb-3 pt-3 pb-3 ">
                    <div class="icon">
                        @if($setting['setting']->box4_icon != '')
                            <img
                                src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box4_icon }}"
                                alt="{{ $setting['setting']->box4_title }}"
                                class="img-fluid icon-img"
                            >
                        @endif
                    </div>

                    <div class="info">
                        <h3 class="pt-0">{{ $setting['setting']->box4_title }}</h3>
                        <p class="no-margin">{!! nl2br($setting['setting']->box4_text) !!}</p>
                    </div>
                </div>
            </div>

            <div class="row border-bottom features pt-2 pb-5">
                <div class="col-lg-12 col-md-12 mt-3 mb-3 pt-3 pb-3 text-center">
                    <h3>{{ $setting['setting']->three_box_heading }}</h3>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 mt-3 mb-3 pt-3 pb-3 right-border">
                    <div class="icon">
                        @if($setting['setting']->box5_icon != '')
                            <img
                                src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box5_icon }}"
                                alt="{{ $setting['setting']->box5_title }}"
                                class="img-fluid icon-img"
                            >
                        @endif
                    </div>

                    <div class="info">
                        <h3 class="pt-0">{{ $setting['setting']->box5_title }}</h3>
                        <p class="no-margin">{!! nl2br($setting['setting']->box5_text) !!}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 mt-3  mb-3 pt-3 pb-3 right-border">
                    <div class="icon">
                        @if($setting['setting']->box6_icon != '')
                            <img
                                src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box6_icon }}"
                                alt="{{ $setting['setting']->box6_title }}"
                                class="img-fluid icon-img"
                            >
                        @endif
                    </div>

                    <div class="info">
                        <h3 class="pt-0">{{ $setting['setting']->box6_title }}</h3>
                        <p class="no-margin">{!! nl2br($setting['setting']->box6_text) !!}</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 mt-3 mb-3 pt-3 pb-3">
                    <div class="icon">
                        @if($setting['setting']->box7_icon != '')
                            <img
                                src="{{ url('/') }}/public/storage/settings/{{ $setting['setting']->box7_icon }}"
                                alt="{{ $setting['setting']->box7_title }}"
                                class="img-fluid icon-img"
                            >
                        @endif
                    </div>

                    <div class="info">
                        <h3 class="pt-0">{{ $setting['setting']->box7_title }}</h3>
                        <p class="no-margin">{!! nl2br($setting['setting']->box7_text) !!}</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="ash-bg">
        <div class="container">
            <div class="row border-bottom features">
                <div class="col-lg-12 col-md-12 mt-3 mb-3 pt-3 pb-3">
                    <h3 class="mb-3">{{ $setting['setting']->content_title_one }}</h3>

                    <div>{!! html_entity_decode($setting['setting']->content_text_one) !!}</div>
                </div>
            </div>
        </div>
    </section>

    <section class="white-bg">
        <div class="container">
            <div class="row border-bottom features">
                <div class="col-lg-12 col-md-12 mt-3 mb-3 pt-3 pb-3">
                    <h3 class="mb-3">{{ $setting['setting']->content_title_two }}</h3>
                    <div>{!! html_entity_decode($setting['setting']->content_text_two) !!}</div>
                </div>

            </div>
        </div>
    </section>

    <section class="ash-bg">
        <div class="container">
            <div class="row border-bottom features">
                <div class="col-lg-12 col-md-12 mt-3 mb-3 pt-3 pb-3">
                    <h3 class="mb-3">{{ $setting['setting']->content_title_three }}</h3>
                    <div>{!! html_entity_decode($setting['setting']->content_text_three) !!}</div>
                </div>
            </div>
        </div>
    </section>
    -->


    <section class="bottom-cta ash-bg">
        <div class="container">
            <div class="row features mt-3 mb-3 pt-5 pb-5 ">
                <div class="title-container col-lg-12 col-md-12">
                    <h2 class="col-sm-12 text-center" style="font-weight: 600;">Take your passion to the next level.</h2>
                    <h4 class="my-4 col-sm-8 text-center">Become part of an inspiring, talented community of creatives, and make a living doing what you love.</h4>
                </div>

                <div class="col-md-8 mx-auto text-center mt-1">
                    <a href="{{ url('/register') }}" class="btn btn--icon btn-ss btn-secondary btn-lg btn-block theme-button w-100 selling-btn"><i class="fa fa-chevron-circle-right"></i> {{ Helper::translation(3187,$translate) }}</a>
                </div>
            </div>
        </div>
    </section>

    @include('footer')
    @include('javascript')
</body>

</html>
@else
@include('503')
@endif
