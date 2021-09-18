@extends('theme2.layout.master')

@push('others')
    {!! NoCaptcha::renderJs() !!}
@endpush

@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/form.css') }}">
@endpush

@section('content')

<section id="contact">
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
      <div class="col-lg-5 col-sm-12 col-md-12 col-xl-5">
        <div class="contact_details">
          <h1 class="contact_details_title">How can We Help?</h1>

          <div class="contact_details_group">
            <div class="contact_details_icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>

            <div class="contact_details_text">
              <p class="contact_sub_title">Office Address</p>
              <p class="contact_text">{{ $allsettings->office_address }}</p>
            </div>
          </div>

          <div class="contact_details_group">
            <div class="contact_details_icon">
              <i class="fas fa-phone-alt"></i>
            </div>

            <div class="contact_details_text">
              <p class="contact_sub_title">Phone Number</p>
              <p class="contact_text">{{ $allsettings->office_phone }}</p>
            </div>
          </div>

          <div class="contact_details_group">
            <div class="contact_details_icon">
              <i class="fas fa-envelope"></i>
            </div>

            <div class="contact_details_text">
              <p class="contact_sub_title">Email</p>
              <p class="contact_text">{{ $allsettings->office_email }}</p>
            </div>
          </div>

          <div class="contact_details_bottom">
            <h3>GoTemplate</h3>
            <h4>Digital product and template marketplace in Bangladesh</h4>
          </div>
        </div>
      </div>

      <div class="offset-lg-1 col-lg-6 col-sm-12 col-md-12 offset-xl-1 col-xl-6">
        <div class="contact_form">
          <h2 class="contact_form_title">Leave Your Messages</h2>

          <form action="{{ route('contact') }}" id="item_form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form_group">
              <p>Name</p>
              <input type="text" name="from_name" placeholder="Your name" class="f_input" required>
            </div>

            <div class="form_group">
              <p>Email</p>
              <input type="email" name="from_email" placeholder="Your email" class="f_input" required>
            </div>

            <div class="form_group">
              <p>Message</p>
              <textarea name="message_text" rows="5" class="f_input" placeholder="Your message"></textarea>
            </div>

            <div class="row">
              <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }} col-md-12">
                {!! app('captcha')->display() !!}
                @if ($errors->has('g-recaptcha-response'))
                  <span class="help-block">
                    <strong class="red">{{ $errors->first('g-recaptcha-response') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <button type="submit" class="s_btn">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection