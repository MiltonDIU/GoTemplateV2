@push('styles')
  <link rel="stylesheet" href="{{ asset('public/assets/theme2/css/dashboard-menu.css') }}">
@endpush

<nav id="dashboard-menu" class="navbar navbar-expand-lg navbar-light" style="border-bottom: none;">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        @if(Auth::user())
      <a class="nav-link {{isset($profile) && $profile ? 'active' : ''}}" href="{{ URL::to('/user') }}/{{ Auth::user()->username }}">
        <i class="fas fa-user"></i>Profile
      </a>
        @endif
      <a class="nav-link {{isset($setting) && $setting ? 'active' : ''}}" href="{{ URL::to('/profile-settings') }}">
        <i class="fas fa-cog"></i>Settings
      </a>
      <a class="nav-link {{isset($purchase) && $purchase ? 'active' : ''}}" href="{{ URL::to('/purchases') }}">
        <i class="fas fa-shopping-cart"></i>Purchase
      </a>
      <a class="nav-link {{isset($favourites) && $favourites ? 'active' : ''}}" href="{{ URL::to('/favourites') }}">
        <i class="fas fa-heart"></i>Favourites
      </a>
      <a class="nav-link {{isset($likes) && $likes ? 'active' : ''}}" href="{{ URL::to('/likes') }}">
        <i class="fas fa-thumbs-up"></i>{{ "Likes" }}
      </a>
      <a class="nav-link {{isset($coupon) && $coupon ? 'active' : ''}}" href="{{ URL::to('/coupon') }}">
        <i class="fas fa-ticket-alt"></i>Coupon
      </a>
      <a class="nav-link {{isset($sales) && $sales ? 'active' : ''}}" href="{{ URL::to('/sales') }}">
        <i class="fas fa-dollar-sign"></i>Sales
      </a>
      <a class="nav-link {{isset($manage_item) && $manage_item ? 'active' : ''}}" href="{{ URL::to('/manage-item') }}">
        <i class="fas fa-stream"></i>Manage Items
      </a>
      <a class="nav-link {{isset($withdrawal) && $withdrawal ? 'active' : ''}}" href="{{ URL::to('/withdrawal') }}">
        <i class="fas fa-briefcase"></i>Withdrawals
      </a>
    </div>
  </div>
</nav>
