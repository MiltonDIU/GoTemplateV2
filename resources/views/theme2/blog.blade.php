@extends('theme2.layout.master')

@section('content')

<section id="blog_box">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="blog_list">
          <div class="single_blog">
            <div class="blog_banner">
              <a href="#">
                <img src="images/blog_1.png" class="blog_banner_img" alt="blog">
              </a>
            </div>

            <div class="blog_data">
              <div class="blog_count">
                <i class="far fa-calendar-alt"></i>
                <p class="data_text">08 June 2021</p>
              </div>

              <div class="blog_count">
                <i class="far fa-comment-dots"></i>
                <p class="data_text">10</p>
              </div>

              <div class="blog_count">
                <i class="far fa-eye"></i>
                <p class="data_text">98</p>
              </div>
            </div>

            <div class="blog_details">
              <a href="#" class="blog_title">App Development Outsourcing – 10 Success Stories to Debunk Your Fears</a>

              <div class="blog_des">
                <p class="b_des_text">
                  Why do you even need any other app stores when you’ve got Android Playstore and Apple App Store? Oh well, there are plenty of reasons: > App Store and Playstore are extremely crowded. Trying to get your app any visibility on these platforms is hard. > There are markets like China where Playsto...
                </p>
              </div>
            </div>

            <div class="blog_btn">
              <a href="#" class="more_btn">Read more</a>
            </div>
          </div>

          <div class="single_blog">
            <div class="blog_banner">
              <a href="#">
                <img src="images/blog_1.png" class="blog_banner_img" alt="blog">
              </a>
            </div>

            <div class="blog_data">
              <div class="blog_count">
                <i class="far fa-calendar-alt"></i>
                <p class="data_text">08 June 2021</p>
              </div>

              <div class="blog_count">
                <i class="far fa-comment-dots"></i>
                <p class="data_text">10</p>
              </div>

              <div class="blog_count">
                <i class="far fa-eye"></i>
                <p class="data_text">98</p>
              </div>
            </div>

            <div class="blog_details">
              <a href="#" class="blog_title">App Development Outsourcing – 10 Success Stories to Debunk Your Fears</a>

              <div class="blog_des">
                <p class="b_des_text">
                  Why do you even need any other app stores when you’ve got Android Playstore and Apple App Store? Oh well, there are plenty of reasons: > App Store and Playstore are extremely crowded. Trying to get your app any visibility on these platforms is hard. > There are markets like China where Playsto...
                </p>
              </div>
            </div>

            <div class="blog_btn">
              <a href="#" class="more_btn">Read more</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="blog_sidebar">
          <div class="blog_category">
            <h3 class="sidebar_title">Categories</h3>

            <ul class="blog_category_main">
              @foreach($data['catData']['post']->all() as $item)
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
              <li class="sidebar_blog">
                <div class="sidebar_blog_img">
                  <img src="images/blog_1.png" alt="blog">
                </div>
                <div class="sidebar_blog_title">
                  <a href="#" class="s_title">App Development Outsourcing – 10 Success Stories to Debunk Your Fears</a>
                </div>
              </li>

              <li class="sidebar_blog">
                <div class="sidebar_blog_img">
                  <img src="images/blog_1.png" alt="blog">
                </div>
                <div class="sidebar_blog_title">
                  <a href="#" class="s_title">App Development Outsourcing – 10 Success Stories to Debunk Your Fears</a>
                </div>
              </li>

              <li class="sidebar_blog">
                <div class="sidebar_blog_img">
                  <img src="images/blog_1.png" alt="blog">
                </div>
                <div class="sidebar_blog_title">
                  <a href="#" class="s_title">App Development Outsourcing – 10 Success Stories to Debunk Your Fears</a>
                </div>
              </li>

              <li class="sidebar_blog">
                <div class="sidebar_blog_img">
                  <img src="images/blog_1.png" alt="blog">
                </div>
                <div class="sidebar_blog_title">
                  <a href="#" class="s_title">App Development Outsourcing – 10 Success Stories to Debunk Your Fears</a>
                </div>
              </li>

            </ul>
          </div>

          <div class="latest_blog sidebar_section">
            <h3 class="sidebar_title">Latest</h3>

            <ul class="sidebar_list">
              <li class="sidebar_blog">
                <div class="sidebar_blog_img">
                  <img src="images/blog_1.png" alt="blog">
                </div>
                <div class="sidebar_blog_title">
                  <a href="#" class="s_title">App Development Outsourcing – 10 Success Stories to Debunk Your Fears</a>
                </div>
              </li>

              <li class="sidebar_blog">
                <div class="sidebar_blog_img">
                  <img src="images/blog_1.png" alt="blog">
                </div>
                <div class="sidebar_blog_title">
                  <a href="#" class="s_title">App Development Outsourcing – 10 Success Stories to Debunk Your Fears</a>
                </div>
              </li>

              <li class="sidebar_blog">
                <div class="sidebar_blog_img">
                  <img src="images/blog_1.png" alt="blog">
                </div>
                <div class="sidebar_blog_title">
                  <a href="#" class="s_title">App Development Outsourcing – 10 Success Stories to Debunk Your Fears</a>
                </div>
              </li>

              <li class="sidebar_blog">
                <div class="sidebar_blog_img">
                  <img src="images/blog_1.png" alt="blog">
                </div>
                <div class="sidebar_blog_title">
                  <a href="#" class="s_title">App Development Outsourcing – 10 Success Stories to Debunk Your Fears</a>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


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

@endsection