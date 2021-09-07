<footer class="footer-area">
        <div class="footer-big section--padding">
            <!-- start .container -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="info-footer">
                        <h4 class="footer-widget-title text--white">{{ Helper::translation(3001,$translate) }}</h4>
                            
                            <ul class="info-contact">
                                
                                <li>
                                    <span class="info-count">{{ $member_count }}</span>
                                    <span>{{ Helper::translation(3002,$translate) }}</span>
                                </li>
                                
                                
                                <li>
                                    <span class="info-count">{{ $total_sale }}</span>
                                    <span>{{ Helper::translation(2930,$translate) }}</span>
                                </li>
                                
                                
                                <li>
                                    <span class="info-count">{{ $total_files }}</span>
                                    <span>{{ Helper::translation(3003,$translate) }}</span>
                                </li>
                                
                            </ul>
                        </div>
                        <!-- end /.info-footer -->
                    </div>
                    <!-- end /.col-md-3 -->

                    <div class="col-lg-5 col-md-6">
                        <div class="footer-menu">
                            <h4 class="footer-widget-title text--white">{{ Helper::translation(3004,$translate) }}</h4>
                            <ul>
                                @foreach($maincategory['view'] as $maincategory)
                                <li>
                                    <a href="{{ URL::to('/shop/category/') }}/{{$maincategory->cat_id}}/{{$maincategory->category_slug}}">{{ $maincategory->category_name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->

                        <div class="footer-menu">
                            <h4 class="footer-widget-title text--white">{{ Helper::translation(2999,$translate) }}</h4>
                            <ul>
                                @if($allsettings->site_blog_display == 1)
                                <li>
                                    <a href="{{ URL::to('/blog') }}">{{ Helper::translation(2877,$translate) }}</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{ URL::to('/contact') }}">{{ Helper::translation(2910,$translate) }}</a>
                                </li>
                                 @foreach($footerpages['pages'] as $pages)
                                                <li>
                                                    <a href="{{ URL::to('/page/') }}/{{ $pages->page_id }}/{{ $pages->page_slug }}">{{ $pages->page_title }}</a>
                                                </li>
                                 @endforeach
                                
                            </ul>
                        </div>
                        <!-- end /.footer-menu -->
                    </div>
                    <!-- end /.col-md-5 -->

                    <div class="col-lg-4 col-md-12">
                        <div class="newsletter">
                           <div class="content">
                            <h4 class="footer-widget-title text--white">{{ Helper::translation(3005,$translate) }}</h4>
                            <p>{{ $allsettings->site_newsletter }}</p>
                            <div>
                   
                            @if ($message = Session::get('news-success'))
                                   <div class="alert alert-success" role="alert">
                                                    <span class="alert_icon lnr lnr-checkmark-circle"></span>
                                                    {{ $message }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                            @endif
                            
                            
                            @if ($message = Session::get('news-error'))
                            <div class="alert alert-danger" role="alert">
                                                    <span class="alert_icon lnr lnr-warning"></span>
                                                    {{ $message }}
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span class="lnr lnr-cross" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                            @endif
                            
                            @if (!$errors->isEmpty())
                            <div class="alert alert-danger" role="alert">
                            <span class="alert_icon lnr lnr-warning"></span>
                            @foreach ($errors->all() as $error)
                             
                            {{ $error }}
                    
                           @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span class="lnr lnr-cross" aria-hidden="true"></span>
                            </button>
                            </div>
                            @endif
                          </div>
                          
                            <form action="{{ route('newsletter') }}" id="footer_form" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="input-group">
                              
                                 <input type="email" class="form-control" placeholder="{{ Helper::translation(3006,$translate) }}" data-bvalidator="required" name="news_email">
                                 <span class="input-group-btn">
                                 <button class="btn btn--sm theme-button" type="submit">{{ Helper::translation(3007,$translate) }}</button>
                                 </span>
                               
                                  </div>
                                  </form>  
                            </div>
                            </div>
                           
                            
                            <!-- end /.social -->
                        </div>
                        <!-- end /.newsletter -->
                    </div>
                    <!-- end /.col-md-4 -->
                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </div>
        <!-- end /.footer-big -->

        <div class="mini-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-left">
                            <p>&copy; {{ date('Y') }}
                                <a href="{{ URL::to('/') }}">{{ $allsettings->site_title }}</a>. {{ Helper::translation(3008,$translate) }}
                            </p>
                        </div>

                        
                    </div>
                    
                    <div class="col-md-6">
                        <div class="text-right">
                            <div class="social social--color--filled">
                                <ul>
                                    @if($allsettings->facebook_url != '')
                                    <li>
                                        <a href="{{ $allsettings->facebook_url }}" target="_blank">
                                            <span class="fa fa-facebook"></span>
                                        </a>
                                    </li>
                                    @endif
                                    @if($allsettings->twitter_url != '')
                                    <li>
                                        <a href="{{ $allsettings->twitter_url }}" target="_blank">
                                            <span class="fa fa-twitter"></span>
                                        </a>
                                    </li>
                                    @endif
                                    @if($allsettings->gplus_url != '')
                                    <li>
                                        <a href="{{ $allsettings->gplus_url }}" target="_blank">
                                            <span class="fa fa-google-plus"></span>
                                        </a>
                                    </li>
                                    @endif
                                    @if($allsettings->pinterest_url != '')
                                    <li>
                                        <a href="{{ $allsettings->pinterest_url }}" target="_blank">
                                            <span class="fa fa-pinterest"></span>
                                        </a>
                                    </li>
                                    @endif
                                    @if($allsettings->linkedin_url != '')
                                    <li>
                                        <a href="{{ $allsettings->linkedin_url }}" target="_blank">
                                            <span class="fa fa-linkedin"></span>
                                        </a>
                                    </li>
                                   @endif 
                                   @if($allsettings->instagram_url != '')
                                    <li>
                                        <a href="{{ $allsettings->instagram_url }}" target="_blank">
                                            <span class="fa fa-instagram"></span>
                                        </a>
                                    </li>
                                   @endif
                                   
                                </ul>
                            </div>
                        </div>

                        
                    </div>
                    <div class="go_top">
                            <span class="lnr lnr-chevron-up"></span>
                        </div>
                </div>
            </div>
        </div>
    </footer>