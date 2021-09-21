@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/blog.css') }}">
@endpush

@section('content')

@php
  $post = $data['edit']['post'];
  $comments = $data['comment']['display'];
@endphp


<section id="blog_box">

  <!-- container start -->
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

    <div class="row">
      <div class="col-lg-8 col-sm-12 col-md-8 col-xl-8">

        <!-- Single blog start -->
        <div class="single_blog">
          <div class="blog_banner">
            @if($post->post_image!='')
              <img class="blog_banner_img" src="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" alt="{{ $post->post_title }}">
            @else
              <img class="blog_banner_img" src="{{ url('/') }}/public/img/no-image.png" alt="{{ $post->post_title }}">
            @endif
          </div>

          <div class="blog_data">
            <div class="blog_count">
              <i class="far fa-calendar-alt"></i>
              <p class="data_text">{{ date('d F Y', strtotime($post->post_date)) }}</p>
            </div>

            <div class="blog_count">
              <i class="far fa-comment-dots"></i>
              <p class="data_text">{{ $data['count'] }}</p>
            </div>

            <div class="blog_count">
              <i class="far fa-eye"></i>
              <p class="data_text">{{ $post->post_view }}</p>
            </div>
          </div>

          <div class="blog_details">
            <h3 class="blog_title">{{ $post->post_title }}</h3>

            <div class="blog_des">
              {!! html_entity_decode($post->post_desc) !!}
            </div>
          </div>
        </div>
        <!-- Single blog end -->


        <!-- blog share start -->
        <div class="blog_share">
          <h6 class="share_text">Share this post on</h6>
          <div class="blog_share_icon">
            <a 
              class="share-button" 
              data-share-url="{{ URL::to('/single') }}/{{ $post->post_slug }}" 
              data-share-network="facebook" 
              data-share-text="{{ $post->post_short_desc }}" 
              data-share-title="{{ $post->post_title }}" 
              data-share-via="{{ $allsettings->site_title }}" 
              data-share-tags="" 
              data-share-media="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" 
              href="javascript:void(0)"
            >
              <i class="fab fa-facebook-f"></i>
            </a>
            <a 
              class="share-button" 
              data-share-url="{{ URL::to('/single') }}/{{ $post->post_slug }}" 
              data-share-network="twitter" 
              data-share-text="{{ $post->post_short_desc }}" 
              data-share-title="{{ $post->post_title }}" 
              data-share-via="{{ $allsettings->site_title }}" 
              data-share-tags="" 
              data-share-media="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" 
              href="javascript:void(0)"
            >
              <i class="fab fa-twitter"></i>
            </a>
            <a 
              class="share-button" 
              data-share-url="{{ URL::to('/single') }}/{{ $post->post_slug }}" 
              data-share-network="linkedin" 
              data-share-text="{{ $post->post_short_desc }}" 
              data-share-title="{{ $post->post_title }}" 
              data-share-via="{{ $allsettings->site_title }}" 
              data-share-tags="" 
              data-share-media="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" 
              href="javascript:void(0)"
            >
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        <!-- blog share end -->


        <!-- blog comment start -->
        <div class="comment_area">
          <div class="blog_comment">
            <p class="comment_count">{{ $data['count'] }} {{ Helper::translation(3054,$translate) }}</p>
          </div>

          <div class="comment___wrapper">
            <ul class="media-list">
                
              @foreach($comments as $comment)
                <li class="depth-1">
                  <div class="media">
                      <div class="pull-left no-pull-xs">
                        <img src="{{ url('/') }}/public/img/no-user.png" class="media-object" alt="{{ $comment->comment_name }}">
                      </div>

                      <div class="media-body">
                        <div class="media_top">
                          <div class="heading_left pull-left">
                            <h4 class="media-heading">{{ $comment->comment_name }}</h4>
                            <span>{{ date('d F Y', strtotime($comment->comment_date)) }}</span>
                          </div>
                        </div>
                        <p>{{ $comment->comment_content }}</p>
                      </div>
                  </div>
                </li>
              @endforeach
                
            </ul>
          </div>

        </div>
        <!-- blog comment end -->


        <!-- reply start -->
        <div class="reply_main">
          <p class="reply_title">Leave a reply</p>

          <div class="reply_box">

            <form action="{{ route('single') }}" id="comment_form" method="post">
              {{ csrf_field() }}

              <input 
                class="reply_name" 
                type="text" 
                name="comment_name" 
                placeholder="Your name" 
                required
              >

              <input 
                class="reply_name" 
                type="text" 
                name="comment_email" 
                placeholder="Your email" 
                required
              >

              <textarea 
                name="comment_content" 
                placeholder="Your text here ..." 
                rows="10" 
                cols="30" 
                required
              ></textarea>

              <input type="hidden" name="post_id" value="{{ $post->post_id }}">
  
              <div class="r_btn">
                <button type="submit" class="reply_btn">Post Now</button>
              </div>
            </form>

          </div>
        </div>
        <!-- reply end -->
      </div>


      <div class="col-lg-4 col-sm-12 col-md-4 col-xl-4">
        <div class="blog_sidebar">

          <div class="blog_category">
            <h3 class="sidebar_title">Categories</h3>

            <ul class="blog_category_main">
              @foreach($data['catData']['post'] as $item)
                <li>
                  <a href="{{ URL::to('/blog') }}/category/{{ $item->blog_cat_id }}/{{ $item->blog_category_slug }}" class="category_box">
                    <span class="category_text">
                      {{ $item->blog_category_name }}
                    </span>
                    <span class="category_text">
                      {{ 
                        $data['category_count']->has($item->blog_cat_id) 
                        ? count($data['category_count'][$item->blog_cat_id]) 
                        : 0 
                      }}
                    </span>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>

          <div class="popular_blog sidebar_section">
            <h3 class="sidebar_title">Popular</h3>

            <ul class="sidebar_list">
              @foreach($data['blog']['popular'] as $item)
                <li class="sidebar_blog">
                  <div class="sidebar_blog_img">
                    @if($item->post_image!='')
                      <img src="{{ url('/') }}/public/storage/post/{{ $item->post_image }}" alt="{{ $item->post_title }}">
                    @else
                      <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->post_title }}">
                    @endif
                  </div>

                  <div class="sidebar_blog_title">
                    <a href="{{ URL::to('/single') }}/{{ $item->post_slug }}" class="s_title">
                      {{ $item->post_title }}
                    </a>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>

          <div class="latest_blog sidebar_section">
            <h3 class="sidebar_title">Latest</h3>

            <ul class="sidebar_list">
              @foreach($data['blogPost']['latest'] as $item)
                <li class="sidebar_blog">
                  <div class="sidebar_blog_img">
                    @if($item->post_image!='')
                      <img src="{{ url('/') }}/public/storage/post/{{ $item->post_image }}" alt="{{ $item->post_title }}">
                    @else
                      <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->post_title }}">
                    @endif
                  </div>

                  <div class="sidebar_blog_title">
                    <a href="{{ URL::to('/single') }}/{{ $item->post_slug }}" class="s_title">
                      {{ $item->post_title }}
                    </a>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>

          <div class="blog_tag sidebar_section">
            <h3 class="sidebar_title">Tags</h3>

            @foreach($data['post_tags'] as $tag)
              <a class="blog_tag_btn" href="{{ url('/tag') }}/blog/{{ strtolower(str_replace(' ','-',$tag)) }}">
                {{ $tag }}
              </a>
            @endforeach
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- container end -->

</section>
@endsection

@else
  @include('theme2.503')
@endif