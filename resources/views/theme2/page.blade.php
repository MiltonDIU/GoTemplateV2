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
<section id="privacy_policy">
  <!-- container start -->
  <div class="container">
    <h1 class="p_title">Privacy Policy</h1>

    <div class="p_box">
      <h2 class="p_sub_title">Go Template Privacy Policy</h2>
      <p class="p_text">GoTemplate always deals with privacy issues in relation to its website. Users' privacy is very important to us and users must agree to the terms & conditions of this Policy before becoming a member/user/author.</p>

      <p class="p_text">This Policy governs the information we collect about you and your use of information that we provide to you. By accepting this Policy and the User Terms & Conditions Agreement, you expressly consent to our use and disclosure of your personal information in a manner prescribed in this Policy. You acknowledge this by using the website.</p>

      <p class="p_text">For the purposes of data protection, GoTemplate stores your personal information and datas' in it’s own server.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Information About Children</h2>
      <p class="p_text">Children (persons under the age of 18 years) are not eligible to use our services unsupervised and we will recommend that children should not submit any personal information to us. If you are under the age of 18 years, you can browse the website only in conjunction with and under the supervision of your parents or guardians. If you are under 18 years of age you cannot use the Membership Section of the website.</p>

      <p class="p_text">It is the responsibility of parents to monitor their children’s use of the website.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Information collection - The General Public / Users</h2>
      <p class="p_text">Our primary purpose is to provide a safer trading experience and encourage buyers and sellers using the website as a medium. We only collect personal information about you that we consider necessary for this purpose and to achieve this goal.</p>

      <p class="p_text">You are under no obligation to provide us with this information and can access many aspects of the website without providing us any personal information.</p>

      <p class="p_text">When you visit this website, we can record certain information in relation to your visit such as:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ul>
              <li class="p_text p_list">Your IP or proxy server IP</li>
              <li class="p_text p_list">Basic domain information</li>
              <li class="p_text p_list">Your Internet service provider is sometimes captured depending on the configuration of your ISP connection</li>
              <li class="p_text p_list">The date and time of your visit to the website</li>
              <li class="p_text p_list">The length of your session</li>
              <li class="p_text p_list">The pages which you have accessed</li>
              <li class="p_text p_list">The number of times you access our site within any month</li>
              <li class="p_text p_list">The size of file you look at</li>
              <li class="p_text p_list">The website which referred you to our website</li>
              <li class="p_text p_list">The operating system which your computer uses</li>
            </ul>
          </div>
        </div>
      </div>

      <p class="p_text">This information is only used for statistical and website development purposes.</p>

      <p class="p_text">Various pages on the GoTemplate website invite you to provide us your name and contact details, for example, regarding the subscription of our newsletter, or to enable us to provide you with website related services such as notifications.</p>

      <p class="p_text">If you use our website’s feedback and support forms, you will be asked to provide your name, organization, title, address, email address and telephone number. Privacy policy will not otherwise collect information from you through this website unless you knowingly provide it to us.</p>

      <p class="p_text">By voluntarily providing information to us when using the website, you are consenting to the collection and use of your personal information by us.</p>

      <p class="p_text">The website uses session cookies, which are used only during a browsing session, and expire when you quit your browser. Upon closing your browser, the session cookie set by this website is destroyed and no personal information is maintained which might identify you should you visit our Site at a later date.</p>

      <p class="p_text">If you choose to buy or sell on our website, we collect information about your buying and selling details. This information is only used for statistical and website development purposes.</p>

      <p class="p_text">Please note that when you voluntarily disclose information on the bulletin boards or in the forums or in the chat areas of the website or in member profile pages, your personal and other information disclosed in your communication shall become public information and can be collected and used by other parties. We cannot control what third parties in the bulletin board, chat room or member profile pages do with your personal information.</p>

      <p class="p_text">This information can be shared with the following companies:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ol>
              <li class="p_text p_list">Facebook</li>
              <li class="p_text p_list">Google</li>
              <li class="p_text p_list">Pinterest</li>
              <li class="p_text p_list">Instagram</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Information collection - Registered Members/ Authors</h2>
      <p class="p_text">We collect information from people who use the Membership Section of our Site (“Members”). This information may be used:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ol>
              <li class="p_text p_list">To send news, information about our activities and general promotional material which we believe may be useful to you or us.</li>
              <li class="p_text p_list">To monitor who is accessing the membership section of the website or using services offered on the website.</li>
              <li class="p_text p_list">To profile the type of people accessing the website.</li>
            </ol>
          </div>
        </div>
      </div>

      <p class="p_text">If you choose to buy or sell on our website we collect information about your buying and selling behaviours.</p>

      <p class="p_text">If you use a payment facilitator on the website, we collect additional necessary information, including but not limited to billing address, credit card number and credit card expiry date.</p>

      <p class="p_text">Depending on your choice of payment method this information can be shared with the following parties:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ul>
              <li class="p_text p_list">Local Banks</li>
              <li class="p_text p_list">1 Card</li>
              <li class="p_text p_list">Bkash</li>
              <li class="p_text p_list">Rocket</li>
              <li class="p_text p_list">Nagad etc</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Use of Information & Disclosure</h2>
      <p class="p_text">Privacy policy will only use the information it collects through the Site for the following purposes:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ul>
              <li class="p_text p_list">Forwarding important information relating to Privacy policy activities and other requested information</li>
              <li class="p_text p_list">Contacting you in response to your feedback or query to discuss our services</li>
              <li class="p_text p_list">Monitoring Site performance</li>
              <li class="p_text p_list">Improving our website and services to you</li>
              <li class="p_text p_list">Internal administration</li>
              <li class="p_text p_list">Other purposes that are in accordance with your instructions</li>
            </ul>
          </div>
        </div>
      </div>

      <p class="p_text">Privacy policy will not give, sell, trade or otherwise disclose any personal information about you to a third party unless:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ul>
              <li class="p_text p_list">You have provided us with your consent</li>
              <li class="p_text p_list">We are required to do so by law</li>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Cookies & Advertising</h2>
      <p class="p_text">Occasionally, we may use third party advertising companies to serve ads based on prior visits to the website. These advertising companies use cookies to anonymously collect data.</p>

      <p class="p_text">No personally identifiable information is collected by these cookies. The anonymous data they collect is kept separate from the personal information in your Member account.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Access & Correction of your details</h2>
      <p class="p_text">You may request access to your personal information and can ask us to correct or remove your personal information. To request such action, please contact us at <a href="mailto:info@gotemplate.net">info@gotemplate.net</a></p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Disclaimer</h2>
      <p class="p_text">This website contains links to other sites. Privacy policy is not responsible for the privacy practices of linked sites. Underlined words and phrases are click-through links or hyperlinks to pages and websites. Privacy policy strongly recommends that you read the Privacy Policy of the linked websites as they may contain further terms and conditions which apply to you.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Security</h2>
      <p class="p_text">This website has security measures in place to protect the loss or misuse of, or alteration or unauthorized access to, information under our control. However, if you send information from this website, it will not be encrypted unless we expressly tell you it is.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Amendments to the Privacy Policy</h2>
      <p class="p_text">We may change this Policy. Such changes will be effective when a notice of the change is made available on the website. We will provide you with thirty (30) days notice to allow you the opportunity to notify Privacy policy if you do not agree to such changes.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">OPT – Out Provision</h2>
      <p class="p_text">To protect you from unwanted email communications, Privacy policy adopts an opt-out facility for marketing communication. If you decide you no longer would like to receive marketing communications from us, please advise us by <a href="contact.html">contacting support</a> or follow the instructions in the “Opt-Out” section of the email you have received.</p>

      <p class="p_text">If you request us not to use personal information in a particular manner or at all, we will adopt all reasonable measures to observe your request but we may still use or disclose that information if:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ol>
              <li class="p_text p_list">We subsequently notify you of the intended use or disclosure and you do not object to that use or disclosure;</li>
              <li class="p_text p_list">We believe that the use or disclosure is reasonably necessary to assist a law enforcement agency or an agency responsible for governmental or public security in the performance of their functions;</li>
              <li class="p_text p_list">We are required by law to disclose the information.</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Further Information</h2>
      <p class="p_text">For further information about Privacy policy’s privacy policy, please contact at <a href="mailto:info@gotemplate.net">info@gotemplate.net</a></p>
    </div>
  </div>
  <!-- container end -->
</section>


<!-- Terms and conditions -->
@elseif($page_id == 12)
<section id="terms_conditions">
  <!-- container start -->
  <div class="container">
    <h1 class="p_title">Terms & Conditions</h1>

    <div class="p_box">
      <p class="p_text">Welcome to GoTemplate!</p>
      <p class="p_text">These terms and conditions outline the rules and regulations for the use of GoTemplate’s Website, located at <a href="https://gotemplate.net/">https://gotemplate.net/</a></p>
      <p class="p_text">By accessing this website we assume you accept these terms and conditions. Do not continue to use GoTemplate if you do not agree to take all of the terms and conditions stated on this page.</p>
      <p class="p_text">The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: “Client”, “You” and “Your” refers to you, the person log on this website and compliant to the Company’s terms and conditions. “The Company”, “Ourselves”, “We”, “Our” and “Us”, refers to our Company. “Party”, “Parties”, or “Us”, refers to both the Client and ourselves. All terms refer to the offer, acceptance, and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of the provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to the same.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Cookies</h2>
      <p class="p_text">We employ the use of cookies. By accessing GoTemplate, you agreed to use cookies in agreement with the GoTemplate’s Privacy Policy.</p>

      <p class="p_text">Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">License</h2>
      <p class="p_text">Unless otherwise stated, GoTemplate and/or its licensors own the intellectual property rights for all material on GoTemplate. All intellectual property rights are reserved. You may access this from GoTemplate for your own personal use subjected to restrictions set in these terms and conditions.</p>

      <p class="p_text">You must not:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ol>
              <li class="p_text p_list">Republish material from GoTemplate</li>
              <li class="p_text p_list">Sell, rent or sub-license material from GoTemplate</li>
              <li class="p_text p_list">Reproduce, duplicate or copy material from GoTemplate</li>
              <li class="p_text p_list">Redistribute content from GoTemplate</li>
            </ol>
          </div>
        </div>
      </div>

      <p class="p_text">This Agreement shall begin on the date hereof.</p>

      <p class="p_text">Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. GoTemplate does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of GoTemplate, its agents and/or affiliates. Comments reflect the views and opinions of the person who posts their views and opinions. To the extent permitted by applicable laws, GoTemplate shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>

      <p class="p_text">GoTemplate reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>

      <p class="p_text">You warrant and represent that:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ul>
              <li class="p_text p_list">You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
              <li class="p_text p_list">The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
              <li class="p_text p_list">The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy;</li>
              <li class="p_text p_list">Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity;</li>
            </ul>
          </div>
        </div>
      </div>

      <p class="p_text">You hereby grant GoTemplate a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Hyperlinking to our Content</h2>

      <p class="p_text">The following organizations may link to our Website without prior written approval:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ul>
              <li class="p_text p_list">Government agencies;</li>
              <li class="p_text p_list">Search engines;</li>
              <li class="p_text p_list">News organizations;</li>
              <li class="p_text p_list">Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
              <li class="p_text p_list">Systemwide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Website.</li>
            </ul>
          </div>
        </div>
      </div>

      <p class="p_text">These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party’s site.</p>

      <p class="p_text">We may consider and approve other link requests from the following types of organizations:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ul>
              <li class="p_text p_list">commonly-known consumer and/or business information sources;</li>
              <li class="p_text p_list">dot.com community sites;</li>
              <li class="p_text p_list">associations or other groups representing charities;</li>
              <li class="p_text p_list">online directory distributors;</li>
              <li class="p_text p_list">internet portals;</li>
              <li class="p_text p_list">accounting, law and consulting firms; and</li>
              <li class="p_text p_list">educational institutions and trade associations.</li>
            </ul>
          </div>
        </div>
      </div>

      <p class="p_text">We will approve link requests from these organizations if we decide that:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ol>
              <li class="p_text p_list">the link would not make us look unfavorably to ourselves or to our accredited businesses;</li>
              <li class="p_text p_list">the organization does not have any negative records with us;</li>
              <li class="p_text p_list">the benefit to us from the visibility of the hyperlink compensates the absence of GoTemplate; and</li>
              <li class="p_text p_list">the link is in the context of general resource information.</li>
            </ol>
          </div>
        </div>
      </div>

      <p class="p_text">These organizations may link to our home page so long as the link:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ol>
              <li class="p_text p_list">is not in any way deceptive;</li>
              <li class="p_text p_list">does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and</li>
              <li class="p_text p_list">fits within the context of the linking party’s site.</li>
            </ol>
          </div>
        </div>
      </div>

      <p class="p_text">If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an email to GoTemplate. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>

      <p class="p_text">Approved organizations may hyperlink to our Website as follows:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ol>
              <li class="p_text p_list">By use of our corporate name; or</li>
              <li class="p_text p_list">By use of the uniform resource locator being linked to; or</li>
              <li class="p_text p_list">By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party’s site.</li>
            </ol>
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
      <p class="p_text">We shall not be held responsible for any content that appears on your Website. You agree to protect and defend us against all claims that are rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Your Privacy</h2>
      <p class="p_text">Please read privacy policy in this page: <a href="privacy-policy.html">GoTemplate Privacy Policy</a></p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Refund Policy</h2>
      <p class="p_text">Please check our refund policy found in this page: <a href="#">GoTemplate Refund Policy</a></p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Payment Policy</h2>
      <p class="p_text">Please check our payment policy found in this page: <a href="payment-policy.html">GoTemplate Payment Policy</a></p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Withdrawal Policy</h2>
      <p class="p_text">Please check our withdrawal policy found in this page: <a href="#">GoTemplate Withdrawal Policy</a></p>
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
              <li class="p_text p_list">limit or exclude our or your liability for death or personal injury;</li>
              <li class="p_text p_list">limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
              <li class="p_text p_list">limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
              <li class="p_text p_list">exclude any of our or your liabilities that may not be excluded under applicable law.</li>
            </ul>
          </div>
        </div>
      </div>

      <p class="p_text">The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ol>
              <li class="p_text p_list">are subject to the preceding paragraph; and</li>
              <li class="p_text p_list">govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</li>
            </ol>
          </div>
        </div>
      </div>

      <p class="p_text">As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
    </div>
  </div>
  <!-- container end -->
</section>


<!-- Payment policy -->
@elseif($page_id == 13)
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

      <p class="p_text">An extended license allows an item to be used in unlimited projects for either personal or commercial use. The item cannot be offered for resale "as-is". It is allowed to distribute/sublicense the source files as part of a larger project.</p>

      <p class="p_text">If you buy a Product, you do so on the following terms:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ol>
              <li class="p_text p_list">You cannot cancel an order for a Product once the order has been submitted;</li>
              <li class="p_text p_list">GoTemplate does not give any undertaking as to the continued availability of Products offered for sale on the website;</li>
              <li class="p_text p_list">Once your order for a Product is accepted, and you pay the fee, you acquire a non-exclusive license to use the Product in accordance with the conditions of the license that you acquire;</li>
              <li class="p_text p_list">ownership of the Product remains with the Seller;</li>
              <li class="p_text p_list">payment of the fee will be made at the time of purchase; and</li>
              <li class="p_text p_list">Sellers are not permitted to buy any of their own Products.</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Payments</h2>

      <p class="p_text">Downloaded digital items will not be Paymented except as required under the Consumer Law or relevant consumer protection laws of Bangladesh.</p>

      <p class="p_text">If you want a Payment or credit on a Product you must make a claim to Support. We will assess claims on their merits, with regard to the digital nature of the goods and any preview or inspection that was available before purchase.</p>

      <p class="p_text">There is no obligation to provide a Payment or credit for reasons including (but not limited to) if you:</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ol>
              <li class="p_text p_list">bought a Product by mistake;</li>
              <li class="p_text p_list">do not have sufficient expertise to use the Product;</li>
              <li class="p_text p_list">have changed your mind about a Product;</li>
              <li class="p_text p_list">ask for goodwill; or</li>
              <li class="p_text p_list">can no longer access a Product because it has been removed by its Seller from the website (you are advised to download Products immediately upon purchase).</li>
            </ol>
          </div>
        </div>
      </div>

      <p class="p_text">When a Payment or credit has been assessed by us as due, this will be paid using the same manner of purchase (that is, if the Product was bought using Member terms and conditions Credits, the Buyer will be Paymented in Member terms and conditions credits; if the Product was bought using a SSLCommerz the Buyer will be Paymented using that mechanism).</p>

      <p class="p_text">You acknowledge and agree that despite Member terms and conditions’s reasonable precautions, Products may be listed at an incorrect price or with incorrect information due to a typographical error or similar oversight. In these circumstances, Member terms and conditions reserves the right to cancel or reverse a transaction, even after your order has been confirmed and a payment has been processed. If a transaction is cancelled, Member terms and conditions will promptly arrange for any payment to be credited or Paymented.</p>

      <p class="p_text">You agree and acknowledge that if, as a Buyer, you lodge a dispute with SSL Commerz we are unable to make any payment out of your Member Account until the SSL Commerz dispute has been closed.</p>

      <p class="p_text">You agree that when a SSL Commerz dispute or claim is not closed by you, but by SSL Commerz you don't have any right to any Payment related to the transaction that has been disputed or claimed.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Vendor Agreement</h2>

      <p class="p_text">Vendors will have the ownership of their contents and we will only keep the contents in our platform as long as the Vendors allow us. We will ensure that the Vendors receive royalty per sell of their contents. The percentage of the royalty will depend on the amount of support the Vendors will require from our end. Vendors will be allowed to market their contents by themselves to increase the sale and increase the payment as royalty. We will also have our own dedicated team which will market the contents in different social media platforms.</p>

      <p class="p_text">Vendors can produce their own video. Note that the sale of the content may depend on the quality of the video and audio. However, it will decrease the royalty percentage. It is because we need to pay the supporting team for their work.</p>
    </div>

    <div class="p_box">
      <h2 class="p_sub_title">Vendor Payment Policy</h2>

      <p class="p_text">Depending on how independent the Vendor is in terms of content production, GoTemplate offers different types of payment.</p>

      <div class="row">
        <div class="offset-lg-1 col-lg-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-xl-1 col-xl-10">
          <div class="p_list_main">
            <ul>
              <li class="p_text p_list">The Vendor gets a royalty (up to maximum 70%) for each content sold from GoTemplate.</li>
              <li class="p_text p_list">This payment can be withdrawn to a bank account or by cheque.</li>
              <li class="p_text p_list">Vendors will be paid upon reaching a payment threshold as decided during the time of agreement with GoTemplate.</li>
              <li class="p_text p_list">Vendor success is the success of GoTemplate and, therefore, GoTemplate will help Vendors to successfully reach their payment threshold as quickly as possible.</li>
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

        <a href="{{ url('/') }}/public/assets/theme2/images/payment-breakdown-gotemplate.png" class="payment_download_btn" download>Click to Download</a>
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
@endif


@endsection