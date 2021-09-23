@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/blog.css') }}">
@endpush

@section('content')

<section id="blog_box">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 col-sm-12 col-md-8 col-xl-8">
        <div class="blog_list" id="listShow">

          @foreach($data['blogData']['post'] as $item)
            <div class="single_blog li-items">
              <div class="blog_banner">
                <a href="{{ URL::to('/single') }}/{{ $item->post_slug }}">
                  @if($item->post_image!='')
                    <img src="{{ url('/') }}/public/storage/post/{{ $item->post_image }}" alt="{{ $item->post_title }}">
                  @else
                    <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $item->post_title }}">
                  @endif
                </a>
              </div>

              <div class="blog_data">
                <div class="blog_count">
                  <i class="far fa-calendar-alt"></i>
                  <p class="data_text">{{ $item->post_date }}</p>
                </div>

                <div class="blog_count">
                  <i class="far fa-comment-dots"></i>
                  <p class="data_text">
                    {{ 
                      $data['comments']->has($item->post_id) 
                      ? count($data['comments'][$item->post_id]) 
                      : 0 
                    }}
                  </p>
                </div>

                <div class="blog_count">
                  <i class="far fa-eye"></i>
                  <p class="data_text">{{ $item->post_view }}</p>
                </div>
              </div>

              <div class="blog_details">
                <a href="{{ URL::to('/single') }}/{{ $item->post_slug }}" class="blog_title">{{ $item->post_title }}</a>

                <div class="blog_des">
                  <p class="b_des_text">
                    {!! html_entity_decode(substr($item->post_short_desc, 0, 300)).'...' !!}
                  </p>
                </div>
              </div>

              <div class="blog_btn">
                <a href="{{ URL::to('/single') }}/{{ $item->post_slug }}" class="more_btn">Read more</a>
              </div>
            </div>
          @endforeach

          <div class="pagination-area">
            <div class="turn-page" id="blogpager"></div>
          </div>

        </div>
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

        </div>
      </div>

    </div>
  </div>
</section>


<!--
<section id="pagination_main">
  <div class="container">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-ellipsis-h"></i></a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
      </ul>
    </nav>
  </div>
</section>
-->


@endsection

@else
  @include('theme2.503')
@endif