@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@php
  $page = $data['page']['page'];
  $page_id = $page->page_id;
@endphp

@section('content')

<!-- About us -->
@if($page_id == 7)
<section id="about_us">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-sm-12 col-md-12 col-xl-6">
        <div class="about_main">
          <h1 class="about_title">About us</h1>
          <p>GoTemplate is an open digital product download platform that aims to contribute to developing personal and professional skills, abilities and traits of individuals by offering online digital products. GoTemplate understands that it is tough for learners to only depend on their academic institutions to fully equip them for their career and profession.</p>

          <p>GoTemplate tries to create a bridge to cover the gap that lies between the latest industry requirements and the actual skills and knowledge of the professional peoples.. Since it is based in Bangladesh, GoTemplate focuses on equipping the local professionals, students and all community peoples preferably with their own currency so that every person can contribute , earn, and learn skills from this platform.</p>
        </div>
      </div>

      <div class="offset-lg-1 col-lg-5 col-sm-12 col-md-12 offset-xl-1 col-xl-5">
        <div class="about_box">
          <h2 class="about_sub_title">GoTemplate</h2>
          <p class="about_tag_line">Digital Product and Template Marketplace in Bangladesh.</p>

          <div class="text_point_main">

            <div class="text_point">
              <i class="fas fa-check"></i>
              <h6>5000+ Products</h6>
            </div>

            <div class="text_point">
              <i class="fas fa-check"></i>
              <h6>200+ Sales</h6>
            </div>

            <div class="text_point">
              <i class="fas fa-check"></i>
              <h6>100+ Professionals</h6>
            </div>

            <div class="text_point">
              <i class="fas fa-check"></i>
              <h6>New products upload every week</h6>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Privacy policy -->
@elseif($page_id == 8)

    <!-- ------------------------------ privacy policy start ------------------------------ -->
    <section id="privacy_policy">
        <!-- container start -->
        <div class="container">
            <h1 class="p_title">Privacy Policy</h1>

            <div class="p_box">
                <h2 class="p_sub_title">Go Template Privacy Policy</h2>
                <p class="p_text">At GoTemplate, accessible from <a href="https://gotemplate.net/">https://gotemplate.net/</a>, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by GoTemplate and how we use it.
                    If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Log Files</h2>
                <p class="p_text">GoTemplate follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this as part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information. Our Privacy Policy was created with the help of the <a href="https://www.privacypolicyonline.com/privacy-policy-generator/">Privacy Policy Generator</a>.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Cookies and Web Beacons</h2>
                <p class="p_text">Like any other website, GoTemplate uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.
                </p>

                <p class="p_text">For more general information on cookies, please read the "Cookies" article from the Privacy Policy Generator.</p>

            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Google DoubleClick DART Cookie</h2>
                <p class="p_text">Google is one of the third-party vendors on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – <a href="https://policies.google.com/technologies/ads">https://policies.google.com/technologies/ads</a>.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Our Advertising Partners</h2>
                <p class="p_text">Some of the advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies of Google - <a href="https://policies.google.com/technologies/ads"></a>.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Privacy Policies</h2>
                <p class="p_text">You may consult this list to find the Privacy Policy for each of the advertising partners of GoTemplate.</p>

                <p class="p_text">Third-party ad servers or ad networks use technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on GoTemplate, which are sent directly to users' browsers. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>

                <p class="p_text">Note that GoTemplate has no access to or control over these cookies that are used by third-party advertisers.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Third Party Privacy Policies</h2>
                <p class="p_text">GoTemplate's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p>

                <p class="p_text">You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites. What Are Cookies?</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Children's Information</h2>
                <p class="p_text">Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>

                <p class="p_text">GoTemplate does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Online Privacy Policy Only</h2>
                <p class="p_text">This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collected in GoTemplate. This policy is not applicable to any information collected offline or via channels other than this website.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Consent</h2>
                <p class="p_text">By using our website, you hereby consent to our Privacy Policy and agree to its Terms and Conditions.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Further Information</h2>
                <p class="p_text">For further information about Privacy policy, please contact to <a href="mailto:operation@gotemplate.net">operation@gotemplate.net</a></p>
            </div>

            <div class="p_box">
                <p class="p_text">Last Updated on 07 Nov 2021</p>
            </div>
        </div>
        <!-- container end -->
    </section>
    <!-- ------------------------------ privacy policy end ------------------------------ -->


<!-- Terms and conditions -->
@elseif($page_id == 12)
    <!-- ------------------------------ terms consitions start ------------------------------ -->
    <section id="terms_conditions">
        <!-- container start -->
        <div class="container">
            <h1 class="p_title">Terms & Conditions</h1>

            <div class="p_box">
                <p class="p_text">Welcome to GoTemplate!</p>
                <p class="p_text">These terms and conditions outline the rules and regulations for the use of GoTemplate’s Website, located at <a href="https://gotemplate.net/">https://gotemplate.net/</a></p>

                <p class="p_text">By accessing this website we assume you accept these terms and conditions. Do not continue to use GoTemplate if you do not agree to take all of the terms and conditions stated on this page.</p>

                <p class="p_text">The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: “Customers”, “You” and “Your” refers to you, the person log on this website and compliant to the Company’s terms and conditions. “The Company”, “Ourselves”, “We”, “Our” and “Us”, refers to our Company. “Party”, “Parties”, or “Us”, refers to both the Customer and ourselves. All terms refer to the offer, acceptance, and consideration of payment necessary to undertake the process of our assistance to the Customers in the most appropriate manner for the express purpose of meeting the Customer’s needs in respect of the provision of the Company’s stated services, in accordance with and subject to, prevailing law of Bangladesh. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to the same.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Cookies</h2>
                <p class="p_text">We employ the use of cookies. By accessing GoTemplate, you agreed to use cookies in agreement with the GoTemplate’s Privacy Policy.</p>

                <p class="p_text">Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">License</h2>
                <p class="p_text">Unless otherwise stated, GoTemplate and its licensors own the intellectual property rights for all material on GoTemplate. All intellectual property rights are reserved. You may access this from GoTemplate for your own personal use subjected to restrictions set in these terms and conditions.</p>

                <p class="p_text">You must not:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">Republish material from GoTemplate</li>
                                <li class="p_text p_list">Sell, rent or sub-license material from GoTemplate</li>
                                <li class="p_text p_list">Reproduce, duplicate or copy material from GoTemplate</li>
                                <li class="p_text p_list">Redistribute content from GoTemplate</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="p_text">This Agreement shall begin on the date hereof.</p>

                <p class="p_text">GoTemplate reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>

                <p class="p_text">You warrant and represent that:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">You are entitled to post the Comments on our website and have all necessary licenses and consents to do so</li>
                                <li class="p_text p_list">The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party</li>
                                <li class="p_text p_list">The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
                                <li class="p_text p_list">Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="p_text">You hereby grant GoTemplate to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Hyperlinking to our Content</h2>

                <p class="p_text">The following organizations may link to our Website without prior written approval:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">Government agencies</li>
                                <li class="p_text p_list">Search engines</li>
                                <li class="p_text p_list">News organizations</li>
                                <li class="p_text p_list">Online directory distributors may link to our website in the same manner as they hyperlink to the websites of other listed businesses</li>
                                <li class="p_text p_list">Systemwide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Website</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="p_text">These organizations may link to our home page, to publications or to other Website information so long as the link:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">Is not in any way deceptive</li>
                                <li class="p_text p_list">Does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services</li>
                                <li class="p_text p_list">Fits within the context of the linking party’s site.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="p_text">We may consider and approve other link requests from the following types of organizations:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">commonly-known consumer and/or business information sources</li>
                                <li class="p_text p_list">dot.com community sites</li>
                                <li class="p_text p_list">associations or other groups representing charities</li>
                                <li class="p_text p_list">online directory distributors</li>
                                <li class="p_text p_list">internet portals</li>
                                <li class="p_text p_list">accounting, law and consulting firms, and</li>
                                <li class="p_text p_list">educational institutions and trade associations.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="p_text">We will approve link requests from these organizations if we decide that:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">the link would not make us look unfavorably to ourselves or to our accredited businesses</li>
                                <li class="p_text p_list">the organization does not have any negative records with us</li>
                                <li class="p_text p_list">the benefit to us from the visibility of the hyperlink compensates the absence of GoTemplate</li>
                                <li class="p_text p_list">the link is in the context of general resource information</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="p_text">These organizations may link to our home page so long as the link:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">Is not in any way deceptive</li>
                                <li class="p_text p_list">Does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services</li>
                                <li class="p_text p_list">Fits within the context of the linking party’s site</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="p_text">If you are one of the organizations listed as above informations and are interested in linking to our website, you must inform us by sending an email to GoTemplate. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>

                <p class="p_text">Approved organizations may hyperlink to our Website as follows:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">By use of our corporate name, or</li>
                                <li class="p_text p_list">By use of the uniform resource locator being linked to, or</li>
                                <li class="p_text p_list">By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="p_text">No use of GoTemplate’s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">iFrames</h2>
                <p class="p_text">Without prior approval and written permission, you may not create frames around our Web Pages that alter in any way the visual presentation or appearance of our Website.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Content Liability</h2>
                <p class="p_text">We shall not be held responsible for any content that appears on the Website. You agree to protect and defend us against all claims that are rising on your content. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Privacy Policy</h2>
                <p class="p_text">Please read privacy policy - <a target="_blank" href="{{url('page/8/Privacy-Policy')}}">GoTemplate Privacy Policy</a></p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Refund Policy</h2>
                <p class="p_text">Please read our refund policy - <a target="_blank" href="{{url('page/11/Refund-Policy')}}">GoTemplate Refund Policy</a></p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Payment Policy</h2>
                <p class="p_text">Please read  our payment policy - <a target="_blank" href="{{url('page/13/Payment-Policy')}}">GoTemplate Payment Policy</a></p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Reservation of Rights</h2>
                <p class="p_text">We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amend these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Removal of links from our website</h2>
                <p class="p_text">If you find any link on our Website that is offensive for any reason, you are free to contact and inform us at any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>

                <p class="p_text">We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Disclaimer</h2>
                <p class="p_text">To the maximum extent permitted by applicable law, we exclude all representations, warranties, and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">limit or exclude our or your liability for death or personal injury</li>
                                <li class="p_text p_list">limit or exclude our or your liability for fraud or fraudulent misrepresentation</li>
                                <li class="p_text p_list">limit any of our or your liabilities in any way that is not permitted under applicable law, or</li>
                                <li class="p_text p_list">exclude any of our or your liabilities that may not be excluded under applicable law</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="p_text">The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">Are subject to the preceding paragraph, and</li>
                                <li class="p_text p_list">Govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <p class="p_text">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
            </div>
        </div>
        <!-- container end -->
    </section>
    <!-- ------------------------------ terms consitions end ------------------------------ -->

<!-- Payment policy -->
@elseif($page_id == 13)
    <!-- ------------------------------ Payment policy start ------------------------------ -->
    <section id="payment_policy">
        <!-- container start -->
        <div class="container">
            <h1 class="p_title">Payment Policy</h1>

            <div class="p_box">
                <p class="p_text">When you buy a Product, you acquire a license to use that Product from the Seller of the Product.</p>

                <p class="p_text">Products are subject to different terms of use – depending on the type of license that you choose when buying the Product.</p>

                <p class="p_text">The different types of licenses and the conditions of use are set out -</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Regular License</h2>

                <p class="p_text">A regular license allows an item to be used in one project for either personal or commercial use by you or on behalf of a client. The item cannot be offered for resale either on its own or as part of a project. Distribution of source files is not permitted.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Extended License</h2>
                <p class="p_text">An extended license allows an item to be used in unlimited projects for either personal or commercial use. The item cannot be offered for resale "as-is". It is allowed to distribute/sublicense the source files as part of a larger project.</p>

                <p class="p_text">Depending on the use you want to make of a Product, you will need to select the correct license required by you. You are responsible for choosing, and warrant that you have chosen, the correct license to meet your requirements. You acknowledge that Member terms and conditions have the right to enforce against you the terms of any license that you have from a Seller.</p>

                <p class="p_text">If you buy a Product, you do so on the following terms:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">you cannot cancel an order for a Product once the order has been submitted</li>
                                <li class="p_text p_list">GoTemplate does not give any undertaking as to the continued availability of Products offered for sale on the website</li>
                                <li class="p_text p_list">Once your order for a Product is accepted, and you pay the fee, you acquire a non-exclusive license to use the Product in accordance with the conditions of the license that you acquire</li>
                                <li class="p_text p_list">Ownership of the Product remains with the Seller</li>
                                <li class="p_text p_list">Payment of the fee will be made at the time of purchase</li>
                                <li class="p_text p_list">Sellers are not permitted to buy any of their own Products</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Customer Payment</h2>

                <p class="p_text">Downloaded digital items will not be Paymented except as required under the Consumer Law or relevant consumer protection laws of Bangladesh.</p>

                <p class="p_text">If you want a Payment or credit on a Product you must make a claim to <a href="https://gotemplate.net/contact">Support</a>. We will assess claims on their merits, with regard to the digital nature of the goods and any preview or inspection that was available before purchase.</p>

                <p class="p_text">There is no obligation to provide a Payment or credit for reasons including (but not limited to) if you:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ol>
                                <li class="p_text p_list">have changed your mind about a Product</li>
                                <li class="p_text p_list">bought a Product by mistake</li>
                                <li class="p_text p_list">do not have sufficient expertise to use the Product</li>
                                <li class="p_text p_list">ask for goodwill; or</li>
                                <li class="p_text p_list">Can no longer access a Product because it has been removed by its Seller from the website <span class="p_semi">(you are advised to download Products immediately upon purchase)</span></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Vendor Agreement</h2>

                <p class="p_text">Vendors will have the ownership of their contents and we will only keep the contents in our platform as long as the Vendors allow us. We will ensure that the Vendors receive royalty per sell of their contents. The percentage of the royalty will depend on the amount of support the Vendors will require from our end. </p>

                <p class="p_text">Vendors will be allowed to market their contents  by themselves to increase the sale and increase the payment as royalty. We will also have our own dedicated team which will market the contents in different social media platforms.</p>

                <p class="p_text">Vendors can produce their own video. Note that the sale of the content may depend on the quality of the video and audio. However, it will decrease the royalty percentage. It is because we need to pay the supporting team for their work.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Vendor Payment</h2>

                <p class="p_text">Depending on how independent the Vendor is in terms of content production, GoTemplate offers different types of payment.</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">The Vendor gets a royalty (up to maximum 70%) for each content sold from GoTemplate</li>
                                <li class="p_text p_list">This payment can be withdrawn to a bank account through our system</li>
                                <li class="p_text p_list">Vendors will be paid upon reaching a payment threshold as decided during the time of agreement with GoTemplate</li>
                                <li class="p_text p_list">Vendor success is the success of GoTemplate and, therefore, GoTemplate will help Vendors to successfully reach their payment threshold as quickly as possible</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container end -->

        <!-- ------------------------------ payment break down start ------------------------------ -->
        <div class="payment_breakdown">
            <!-- container start -->
            <div class="container">
                <div class="p_box">
                    <h2 class="p_sub_title">Payment Breakdown</h2>

                    <!-- table start -->
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
                    <!-- table end -->

                    <a href="images/Payment Breakdown - GoTemplate.png" class="payment_download_btn" download>Click to Download</a>
                </div>
            </div>
            <!-- container end -->
        </div>
        <!-- ------------------------------ payment break down end ------------------------------ -->

        <!-- container start -->
        <div class="container">
            <div class="p_box">
                <h2 class="p_sub_title">Contact</h2>

                <p class="p_text">If you would like to contact us concerning any matter relating to this Payment Policy, you may send an email to <a href="mailto:info@gotemplate.net">info@gotemplate.net</a></p>
            </div>
        </div>
        <!-- container end -->
    </section>
    <!-- ------------------------------ Payment policy end ------------------------------ -->

@elseif($page_id == 11)
    <!-- ------------------------------ Refund Policy start ------------------------------ -->
    <section id="refund_policy">
        <div class="container">
            <h1 class="p_title">Refund Policy</h1>

            <div class="p_box">
                <p class="p_text">GoTemplate is a marketplace with a customer and a vendor side. These refund rules are created with the protection of both the customer and vendor in mind and apply to both customer and vendor. Please take into mind that unlike physical goods, digital goods can't be returned. Because of this there are different rules for refunding digital goods.</p>

                <p class="p_text">When requesting a refund, please do so by using the "request refund" button from Your profile purchase page.</p>

                <p class="p_text">Please take into account that a refund can only be given within 30 days after your purchase. You can only request a refund once, so please make sure you submit any required information. Please first always contact the vendor before requesting a refund.</p>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">How to apply for a Refund?</h2>
                <p class="p_text">If you want to apply for a refund, please follow the following steps:</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">Before applying for a refund , you must inform your query to the specific product Vendor or our support team <a target="_blank" href="{{ url('contact') }}">here</a>. Without communicating with the Vendor or support team your request will not be accepted.</li>

                                <li class="p_text p_list">You can do this by first logging in. Then open the user menu by clicking on your avatar in the top right corner and selecting Purchase History. On the right side of every purchased product you will find several options, including a refund request button. From there you can request for refund</li>

                                <li class="p_text p_list">Our team will analyze your refund request with full prior and will refund the amount if your request is matched to the company policy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Please note that we do not refund your purchase in the following situations:</h2>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">Removed the product by vendor and no longer to use or the vendor who previously provided the product is no longer active on our platform (our advice to download the product as soon as you have purchased them to avoid this situation)</li>

                                <li class="p_text p_list">The reason for the refund is you have made an accidental purchase</li>

                                <li class="p_text p_list">The reason for the refund is you don't want the item anymore</li>

                                <li class="p_text p_list">The item is not working as it should because you do not have the expertise to use the item correctly & Lack of skills or knowledge to use the product</li>

                                <li class="p_text p_list">The problem is caused by a misconfigured environment and not by a defect of the item itself</li>

                                <li class="p_text p_list">You have not posted a message with a detailed description of the problem to the  support team or have not given the vendor the chance to solve the problem</li>

                                <li class="p_text p_list">If the purchase is more than 30 days ago</li>

                                <li class="p_text p_list">Do not provide sufficient information to fulfill the refund agreement</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">The Refund Request Processes</h2>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">After a customer has applied for a refund request, the vendor has 30 days to help/solve the customer queries to solve the problem and decide regarding the refund request. If the vendor does not respond to the customer through the refund request during this period, the refund request will automatically be decided in favor of the customer.</li>

                                <li class="p_text p_list">If the vendor does respond to the customer through the refund request, but the customer does not clear specifically to the vendor regarding the refund request. Then the refund request will be automatically closed and no refund will be given.</li>

                                <li class="p_text p_list">If a refund request is closed, the customer has the opportunity to dispute the refund request if he/she thinks this is an incorrect decision. The customer can communicate with our support team  <a target="_blank" href="{{ url('contact') }}">here</a>.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Processing the refund</h2>

                <p class="p_text">If a refund request has resulted in a refund. The refund request will have to be processed by GoTemplate. This normally takes 30 business days to complete.</p>

                <div class="row">
                    <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
                        <div class="p_list_main">
                            <ul>
                                <li class="p_text p_list">If the order was paid with GoTemplate Wallet, this can take 30 business days, depending on your credit card company.</li>

                                <li class="p_text p_list">If the order was paid using a credit card, this can take 30 business days, depending on your credit card company.</li>

                                <li class="p_text p_list">If the order was paid using SSL Commerz, this can take 30 business days, depending on the SSLCommerz Team.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p_box">
                <h2 class="p_sub_title">Resolving disputes - GoTemplate Support Team</h2>
                <p class="p_text">If one Customer and Vendor can't come to an agreement about a refund, he/she can raise a dispute and have GoTemplate investigate the matter. We may ask you to provide supporting documentation or evidence. Any refund issued by GoTemplate is entirely discretionary. We will make a decision based on all available information and you agree that our decision is final.</p>

                <p class="p_text">Both parties  can communicate with our support team  <a target="_blank" href="{{ url('contact') }}">here</a>.</p>
            </div>
        </div>
    </section>
    <!-- ------------------------------ Refund Policy end ------------------------------ -->

@endif


@endsection

@else
  @include('theme2.503')
@endif
