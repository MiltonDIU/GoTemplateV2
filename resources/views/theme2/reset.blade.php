@if($allsettings->maintenance_mode == 0)

@extends('theme2.layout.master')

@section('content')
{{ dd($data['token'])}}
  @include("theme2.layout.breadcrumb", [
    "list" => [array("path" => "/login", "text" => 3015)]
  ])

  <section class="login_area section--padding2">
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
          <form method="POST" action="{{ route('reset') }}">
            @csrf

            <input type="hidden" name="user_token" value="{{ $data['token'] }}">

            <div class="cardify login">
              <div class="login--form">

                <div class="form-group">
                  <label for="pass">{{ Helper::translation(3113,$translate) }}</label>

                  <input id="password" type="password" class="text_field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>


                <div class="form-group">
                  <label for="pass">{{ Helper::translation(3114,$translate) }}</label>
                  <input id="password-confirm" type="password" class="text_field" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button class="btn btn--md theme-button" type="submit">{{ Helper::translation(3015,$translate) }}</button>

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