@extends('theme2.layout.master')

@section('content')
  @include("./components/hero", [
    "list" => [array("path" => "/purchases", "text" => 3024)],
    "headline" => 3024
  ])

  <section class="dashboard-area pt-0">

    <div class="dashboard_contents">

      <div class="container">

        <div>
          @if ($message = Session::get('success'))
          <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
            <span>
              <span class="alert_icon lnr lnr-checkmark-circle"></span>
              <span>{{ $message }}</span>
            </span>
            <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
          </div>
          @endif

          @if ($message = Session::get('error'))
          <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
            <span>
              <span class="alert_icon lnr lnr-warning"></span>
              <span>{{ $message }}</span>
            </span>
            <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
          </div>
          @endif

          @if (!$errors->isEmpty())
          <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
            <span>
              <span class="alert_icon lnr lnr-warning"></span>
              @foreach ($errors->all() as $error)
                {{ $error }}
              @endforeach
            </span>

            <i type="button" class="fas fa-times close" data-bs-dismiss="alert" aria-label="Close"></i>
          </div>
          @endif
        </div>

        <div class="product_archive">
          <div class="title_area">
            <div class="row">
              <div class="col-md-4 col-sm-4">
                <h4>{{ Helper::translation(3053,$translate) }}</h4>
              </div>
              <div class="col-md-4 col-sm-4">
                <h4 class="add_info">{{ Helper::translation(3139,$translate) }}</h4>
              </div>
              <div class="col-md-2 col-sm-2">
                <h4>{{ Helper::translation(2888,$translate) }}</h4>
              </div>
              <div class="col-md-2 col-sm-2">
                <h4>{{ Helper::translation(3140,$translate) }}</h4>
              </div>
            </div>
          </div>

          <div class="row">

            @foreach($orderData['item'] as $item)
              <div class="col-md-12">
                <div class="single_product clearfix">
                  <div class="row">
                    
                    <div class="col-lg-4 col-md-4 col-sm-4" style="margin-top: -24px;">
                      @include('theme2.layout.item', [
                        "item" => $item,
                        "item_slider" => true
                      ])
                    </div>

                    <div class="col-lg-4 col-md-4 col-6 xs-fullwidth">
                      <div class="product__additional_info">
                        <ul>
                          <li>
                            <p>
                              <span>{{ __('Order Id :') }} </span> #{{ $item->ord_id }}
                            </p>
                          </li>
                          <li>
                            <p>
                              <span>{{ __('Purchase Id :') }} </span> {{ $item->purchase_token }}
                            </p>
                          </li>
                          <li>
                            <p>
                              <span>{{ Helper::translation(3102,$translate) }}: </span> {{ date("d F Y", strtotime($item->start_date)) }}
                            </p>
                          </li>
                          <li>
                            <p>
                              <span>{{ Helper::translation(3103,$translate) }}: </span> {{ date("d F Y", strtotime($item->end_date)) }}
                            </p>
                          </li>
                          <li class="license theme-color">
                            <p>
                              <span>{{ Helper::translation(3105,$translate) }}:</span> {{ $item->license }}
                            </p>
                          </li>
                          <li>
                            <p>
                              <span>{{ Helper::translation(3142,$translate) }}:</span> {{ $item->username }}
                            </p>
                          </li>
                          @if($item->approval_status != 'payment released to buyer')
                          <li>
                            <p>
                              <span>{{ Helper::translation(3143,$translate) }}:</span> <a href="javascript:void(0);" data-toggle="modal" data-target="#refund_{{ $item->ord_id }}"> Send Request</a>
                            </p>
                          </li>
                          @endif
                        </ul>
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-6 xs-fullwidth">
                      <div class="product__price_download">
                        <div class="item_price v_middle">
                          <span>{{ $item->item_price }} {{ $allsettings->site_currency }}</span>
                        </div>
                        <div class="item_action v_middle">
                          @if($item->approval_status != 'payment released to buyer')
                          @if($item->approval_status == 'payment released to vendor')
                          <a href="{{ url('/purchases') }}/{{ $item->item_token }}" class="btn btn--md theme-button">{{ Helper::translation(3144,$translate) }}</a><a href="{{ url('/invoice') }}/{{ $item->item_token }}/{{ $item->ord_id }}" class="btn btn-danger btn--md"><i class="dwg-download mr-1"></i>{{ __('Invoice') }}</a>

                          @if($item->rating != 0)
                          <a href="javascript:void(0);" class="btn btn--md btn--round btn--white rating--btn" data-toggle="modal" data-target="#myModal_{{ $item->ord_id }}">
                            <div class="rating product--rating">
                              <ul>
                                @if($item->rating == 1)
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                @endif
                                @if($item->rating == 2)
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                @endif
                                @if($item->rating == 3)
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                @endif
                                @if($item->rating == 4)
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                @endif
                                @if($item->rating == 5)
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star"></span>
                                </li>
                                @endif
                              </ul>
                            </div>
                          </a>
                          @else
                          <a href="javascript:void(0);" class="btn btn--md btn--round btn--white rating--btn not--rated" data-toggle="modal" data-target="#myModal_{{ $item->ord_id }}">
                            <P class="rate_it">{{ Helper::translation(3145,$translate) }}</P>
                            <div class="rating product--rating">
                              <ul>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                                <li>
                                  <span class="fa fa-star-o"></span>
                                </li>
                              </ul>
                            </div>
                          </a>
                          @endif
                          @else
                          <span id="card-errors">{{ Helper::translation(4812,$translate) }}</span>
                          @endif
                          @else
                          <span id="card-errors">{{ $item->approval_status }}</span>
                          @endif

                          <!-- end /.rating_btn -->
                        </div>
                        <!-- end /.item_action -->
                      </div>
                      <!-- end /.product__price_download -->
                    </div>
                    <!-- end /.col-md-4 -->
                  </div>
                </div>
              </div>

              <div class="modal fade rating_modal" id="refund_{{ $item->ord_id }}" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h3 class="modal-title" id="rating_modal">{{ Helper::translation(3143,$translate) }}</h3>
                      <h4>{{ $item->item_name }}</h4>

                    </div>
                    <!-- end /.modal-header -->

                    <div class="modal-body">
                      <form action="{{ route('refund') }}" class="setting_form" method="post" id="profile_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                        <input type="hidden" name="ord_id" value="{{ $item->ord_id }}">
                        <input type="hidden" name="purchased_token" value="{{ $item->purchase_token }}">
                        <input type="hidden" name="item_token" value="{{ $item->item_token }}">
                        <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                        <input type="hidden" name="item_user_id" value="{{ $item->item_user_id }}">
                        <input type="hidden" name="item_url" value="{{ url('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">
                        <ul>

                          <li>
                            <p>{{ Helper::translation(3146,$translate) }}</p>
                            <div class="right_content">
                              <div class="select-wrap">
                                <select name="refund_reason">
                                  <option value="{{ Helper::translation(3147,$translate) }}">{{ Helper::translation(3147,$translate) }}</option>
                                  <option value="{{ Helper::translation(3148,$translate) }}">{{ Helper::translation(3148,$translate) }}</option>
                                  <option value="{{ Helper::translation(3149,$translate) }}">{{ Helper::translation(3149,$translate) }}</option>
                                  <option value="{{ Helper::translation(3150,$translate) }}">{{ Helper::translation(3150,$translate) }}</option>
                                  <option value="{{ Helper::translation(3151,$translate) }}">{{ Helper::translation(3151,$translate) }}</option>
                                </select>

                                <span class="lnr lnr-chevron-down"></span>
                              </div>
                            </div>
                          </li>
                        </ul>

                        <div class="rating_field">
                          <label for="rating_field">{{ Helper::translation(3054,$translate) }}</label>
                          <textarea name="refund_comment" id="refund_comment" class="text_field" required="required"></textarea>

                        </div>
                        <button type="submit" class="btn btn--md theme-button">{{ Helper::translation(3152,$translate) }}</button>

                      </form>
                      <!-- end /.form -->
                    </div>
                    <!-- end /.modal-body -->
                  </div>
                </div>
              </div>


              <div class="modal fade rating_modal" id="myModal_{{ $item->ord_id }}" tabindex="-1" role="dialog" aria-labelledby="rating_modal">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h3 class="modal-title" id="rating_modal">{{ Helper::translation(3153,$translate) }}</h3>
                      <h4>{{ $item->item_name }}</h4>
                      <p>by
                        {{ $item->username }}
                      </p>
                    </div>
                    <!-- end /.modal-header -->

                    <div class="modal-body">
                      <form action="{{ route('purchases') }}" class="setting_form" method="post" id="profile_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="item_id" value="{{ $item->item_id }}">
                        <input type="hidden" name="ord_id" value="{{ $item->ord_id }}">
                        <input type="hidden" name="item_token" value="{{ $item->item_token }}">
                        <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                        <input type="hidden" name="item_user_id" value="{{ $item->item_user_id }}">
                        <input type="hidden" name="item_url" value="{{ url('/item') }}/{{ $item->item_slug }}/{{ $item->item_id }}">
                        
                        <ul>
                          <li>
                            <p>{{ Helper::translation(3154,$translate) }}</p>
                            <div class="right_content btn btn--round btn--white btn--md">
                              <select name="rating" class="give_rating">
                                <option value="1" @if($item->rating == 1) selected @endif>1</option>
                                <option value="2" @if($item->rating == 2) selected @endif>2</option>
                                <option value="3" @if($item->rating == 3) selected @endif>3</option>
                                <option value="4" @if($item->rating == 4) selected @endif>4</option>
                                <option value="5" @if($item->rating == 5) selected @endif>5</option>
                              </select>
                            </div>
                          </li>

                          <li>
                            <p>{{ Helper::translation(3155,$translate) }}</p>
                            <div class="right_content">
                              <div class="select-wrap">
                                <select name="rating_reason">
                                  <option value="design" @if($item->rating_reason == 'design') selected @endif>{{ Helper::translation(3156,$translate) }}</option>
                                  <option value="customization" @if($item->rating_reason == 'customization') selected @endif>{{ Helper::translation(3157,$translate) }}</option>
                                  <option value="support" @if($item->rating_reason == 'support') selected @endif>{{ Helper::translation(3055,$translate) }}</option>
                                  <option value="performance" @if($item->rating_reason == 'performance') selected @endif>{{ Helper::translation(3158,$translate) }}</option>
                                  <option value="documentation" @if($item->rating_reason == 'documentation') selected @endif>{{ Helper::translation(3159,$translate) }}</option>
                                </select>

                                <span class="lnr lnr-chevron-down"></span>
                              </div>
                            </div>
                          </li>
                        </ul>

                        <div class="rating_field">
                          <label for="rating_field">{{ Helper::translation(3054,$translate) }}</label>
                          <textarea name="rating_comment" id="rating_comment" class="text_field" required="required">{{ $item->rating_comment }}</textarea>
                          <p class="notice">{{ Helper::translation(3160,$translate) }} </p>
                        </div>

                        <button type="submit" class="btn btn--md theme-button">{{ Helper::translation(3161,$translate) }}</button>

                      </form>
                      <!-- end /.form -->
                    </div>
                    <!-- end /.modal-body -->
                  </div>
                </div>
              </div>

            @endforeach

            <div class="col-md-12">
              <div class="pagination-area pagination-area2">
                <nav class="navigation pagination " role="navigation"></nav>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>

  </section>
@endsection