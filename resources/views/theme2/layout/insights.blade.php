<!-- ------------------------------ premium member start ------------------------------ -->
<section id="premium_member">
    <!-- container start -->
    <div class="container">
        <div class="counter_main">
            <div class="row">
                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
                    <div class="counter_number">
                        <h3><span class="counter">{{ $totalCustomer }}</span></h3>
                        <p>Customers</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
                    <div class="counter_number">
                        <h3><span class="counter">{{ $totalVendors }}</span></h3>
                        <p>Vendors</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
                    <div class="counter_number">
                        <h3><span class="counter">{{ $totalCategories }}</span></h3>
                        <p>Categories</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3">
                    <div class="counter_number">
                        <h3><span class="counter">{{ $totalProduct }}</span></h3>
                        <p>Products</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="member_action">
            <div class="action_button">
                <a href="{{ url('/register') }}">Become our Exclusive Vendor</a>
            </div>
            <div class="member_text">
                <p>Easy payment in local currency</p>
            </div>
        </div>
    </div>
    <!-- container end -->
</section>
<!-- ------------------------------ premium member end ------------------------------ -->
