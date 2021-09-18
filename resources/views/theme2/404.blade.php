@extends('theme2.layout.master')

@section('content')
<section id="error">
  <div class="container">
    <div class="row">
    
      <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
        <div class="error_text">
          <h1>Oops!</h1>
          <h2>We can not seem to find a page you are looking for...</h2>
          <a href="index.html">Go to Home Page</a>
        </div>
      </div>

      <div class="col-lg-6 col-sm-12 col-md-6 col-xl-6">
        <div class="error_img">
          <img src="images/404.png" alt="error">
        </div>
      </div>

    </div>
  </div>
</section>
@endsection