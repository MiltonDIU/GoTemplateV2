@extends('theme2.layout.master')

@section('content')

  @php
    $blogs = $data['blogData']['post'];
    $items = $data['itemData']['item'];
  @endphp

  @if($data['type'] == 'blog')
  <section class="blog_area section--padding2">
    <div class="container">
      <div class="row" data-uk-grid>
          
        @foreach($blogs as $post)
        <div class="col-lg-4 col-md-6">
          <div class="single_blog blog--card">
            <figure>
                
              <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}">
                @if($post->post_image!='')
                  <img src="{{ url('/') }}/public/storage/post/{{ $post->post_image }}" alt="{{ $post->post_title }}" class="tag-img">
                @else
                  <img src="{{ url('/') }}/public/img/no-image.png" alt="{{ $post->post_title }}" class="tag-img">
                @endif
              </a>

              <figcaption>
                <div class="blog__content">
                  <a href="{{ URL::to('/single') }}/{{ $post->post_slug }}" class="blog__title ellipsis">
                    <h4>{{ $post->post_title.'...' }}</h4>
                  </a>
                  <p>{{ substr($post->post_short_desc,0,200).'...' }}</p>
                </div>

                <div class="blog__meta">
                  <div class="date_time">
                    <i class="far fa-calendar-alt"></i>
                    <p>{{ date('d F Y', strtotime($post->post_date)) }}</p>
                  </div>
                  <div class="comment_view">
                    <p class="comment">
                      <i class="far fa-comment-dots"></i>{{ $data['comments']->has($post->post_id) ? count($data['comments'][$post->post_id]) : 0 }}
                    </p>
                    <p class="view">
                      <i class="far fa-eye"></i>{{ $post->post_view }}
                    </p>
                  </div>
                </div>
              </figcaption>
            </figure>
          </div> 
        </div>
        @endforeach 

      </div>
    </div>
  </section>
  @endif
     
    
  @if($data['type'] == 'item')
  <section class="blog_area section--padding2">
    <div class="container">

      <div class="row">
        @foreach( $items as $item)
          @include('theme2.layout.item', [
            "item" => $item
          ])
        @endforeach
      </div>

    </div>
  </section>
  @endif
  
@endsection