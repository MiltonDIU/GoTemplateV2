@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')

    <!-- ------------------------------ User guideline start ------------------------------ -->
    <section id="user_guideline">
        <div class="container">
            <div class="row">

                <div class="video_box">

                    <!-- THE PLAYLIST -->
                    <div class="vid-list-container">
                        <ol id="vid-list">
                            <li>
                                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/oysX5mhAnPw?autoplay=1&rel=0&showinfo=0&autohide=1'">

                                    <div class="desc">How to Create & Update User Account?</div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='https://youtube.com/embed/qEcVQWVQiWk?autoplay=1&rel=0&showinfo=0&autohide=1'">

                                    <div class="desc">How to Purchase & Download a Product from Customer Account?</div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void();" onClick="document.getElementById('vid_frame').src='https://youtube.com/embed/NuEKqQYGQm4?autoplay=1&rel=0&showinfo=0&autohide=1'">

                                    <div class="desc">How to Upload a Product from a Vendor Account?</div>
                                </a>
                            </li>
                        </ol>
                    </div>

                    <!-- THE YOUTUBE PLAYER -->
                    <div class="vid-container">
                        <iframe id="vid_frame" src="https://www.youtube.com/embed/oysX5mhAnPw?rel=0&showinfo=0&autohide=1" frameborder="0" width="560" height="315"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------------------ User guideline end ------------------------------ -->

@endsection

@else
  @include('theme2.503')
@endif
