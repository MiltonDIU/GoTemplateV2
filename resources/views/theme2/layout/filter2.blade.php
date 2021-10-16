
<!-- start Filter -->
<div class="filter_field">
    <div class="row">
        <div class="col-lg-4 col-sm-12 col-md-6 col-xl-4 filter_box">
            <div class="filter_options">
                <label for="filter_s">Tags</label>
                <div class="f_s_box">
                    <input type="text" id="filter_s" data-ref="input-search">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 col-md-6 col-xl-4 filter_box">
            <div class="filter_options">
                <label for="filter_p">Price</label>
                <select name="" id="filter_p" class="f_o_select">
                    <option value="" disabled selected>Sort by Price</option>
                    <option value="price:asc">Low to High</option>
                    <option value="price:desc">High to Low</option>
                </select>
            </div>
        </div>

        <!-- TODO: temporary comment, need to implement in future -->
        <!--
        <div class="col-lg-3 col-sm-12 col-md-6 col-xl-3 filter_box">
          <div class="filter_options">
            <label for="filter_t">Type</label>
            <select name="" id="filter_t" class="f_o_select">
              <option value="" disabled selected>Choose by Type</option>
              <option value=".popular">Popular</option>
              <option value=".recent">Recent</option>
            </select>
          </div>
        </div>
        -->

        <div class="col-lg-4 col-sm-12 col-md-6 col-xl-4 filter_box">
            <div class="filter_options">
                <label for="filter_l">License</label>
                <select name="" id="filter_l" class="f_o_select">
                    <option value="" disabled selected>Choose by License</option>
                    <!-- <option value=".mix">All</option> -->
                    <option value=".free">Free</option>
                    <option value=".premium">Premium</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- end Filter -->
