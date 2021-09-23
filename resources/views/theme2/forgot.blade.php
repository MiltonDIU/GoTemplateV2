@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
  @include("./components/hero", [
    "list" => [array("path" => "/password/reset", "text" => 3009)],
    "headline" => 3009
  ])

  <section class="pass_recover_area section--padding2">
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

        <div class="col-lg-6 offset-lg-3">

          <form method="POST" action="{{ route('forgot') }}" id="item_form">
            @csrf
            <div class="cardify recover_pass">
              <div class="login--header">
                <p>{{ Helper::translation(3010,$translate) }}</p>
              </div>

              @if(isset($user['user']->name))
                {{ $user['user']->name }}
              @endif

              <div class="login--form">
                <div class="form-group">
                  <label for="email_ad">{{ Helper::translation(3011,$translate) }}</label>
                  <input id="email" type="text" class="text_field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email address" data-bvalidator="email,required" autocomplete="email" autofocus>

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <button class="btn btn--md register_btn theme-button" type="submit">
                  {{ Helper::translation(3012,$translate) }}
                </button>
              </div>
            </div>
          </form>

        </div>

      </div>
    </div>
  </section>
@endsection

@else
  @include('theme2.503')
@endif