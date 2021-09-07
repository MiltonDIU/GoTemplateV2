<style type="text/css">
.theme-primary
{
background:{{ $allsettings->site_primary_color }} !important;
}
.theme-button
{
background:{{ $allsettings->site_button_color }} !important;
}
.theme-color
{
color:{{ $allsettings->site_button_color }} !important;
}
#product-details ul li:before {
  content: url("{{ asset('public/assets/images/check.png') }}");
  margin-right: 15px;
}
.promotion-area {
  padding: 140px 0;
  background: url("{{ asset('public/assets/images/bundlebg.jpg') }}");
  -webkit-background-size: cover;
          background-size: cover;
}
.radius-right
{
border-radius:0px 4px 4px 0px;
-webkit-border-radius:0px 4px 4px 0px;
-moz-border-radius:0px 4px 4px 0px;
background:#555555;
}
.login-btn .radius-right
{
left:-10px;
}
.radius-left
{
background:#666666;
border-radius:4px 0px 0px 4px;
-webkit-border-radius:4px 0px 0px 4px;
-moz-border-radius:4px 0px 0px 4px;
}

.radius-left:hover,.radius-right:hover
{
background:{{ $allsettings->site_button_color }} !important;
color:#fff;
}
.author__notification_area > ul.topmenu li
{
padding:30px 5px;
}
.topmenu li a
{
  color:#999;
  padding:10px;
}
.topmenu li a:hover
{
background:{{ $allsettings->site_button_color }} !important;
color:#fff;
padding:10px;
border-radius:4px;
-webkit-border-radius:4px;
-moz-border-radius:4px;
}

.countdown-timer ul li
{
list-style:none;
display:inline-block;
background:{{ $allsettings->site_primary_color }};
color:#FFFFFF;
text-align:center;
min-width:70px;
opacity:0.6;
}

.dropdowns {
  position: absolute;
  min-width: 271px;
  background: #fff;
  /*padding: 19px 30px;*/
  z-index: 3;
  visibility: hidden;
  opacity: 0;
  -webkit-transition: 0.3s ease;
  -o-transition: 0.3s ease;
  transition: 0.3s ease;
  border-top: 1px solid {{ $allsettings->site_button_color }} !important;
  -webkit-border-radius: 0 0 4px 4px;
          border-radius: 0 0 4px 4px;
  -webkit-box-shadow: 0 5px 40px rgba(82, 85, 90, 0.2);
          box-shadow: 0 5px 40px rgba(82, 85, 90, 0.2);
  /* dropdown menu */
}
.dropdowns:before {
  content: '';
  position: absolute;
  border-left: 10px solid transparent;
  border-right: 10px solid transparent;
  border-bottom: 10px solid {{ $allsettings->site_button_color }} !important;
  bottom: 100%;
}
.dropdowns.dropdown--author ul li a:hover {
  
  color: {{ $allsettings->site_button_color }} !important;
}
.autor__info .ammount {
  color: {{ $allsettings->site_button_color }} !important;
  font-size: 15px;
  font-weight: 400;
}
.author__avatar img
{
max-width:44px;
}

.dropdowns
{
min-width:200px !important;
}
.mainmenu__menu .navbar-nav > li:hover > a{
color:#fff !important;
}
.mainmenu__menu .navbar-nav > li:hover {
  color:#fff !important;
  background:{{ $allsettings->site_button_color }} !important;
}

.search-btn {
  background: {{ $allsettings->site_primary_color }} !important;
  color: #fff;
  
  border-radius: 0px;
  min-width: 150px;
  font-size: 15px;
  border: 0;
}

.search-area2:before, .breadcrumb-area:before {
  content: '';
  height: 100%;
  width: 100%;
  position: absolute;
  background: url("{{ asset('public/storage/settings/') }}/{{ $allsettings->site_banner }}") !important;
  opacity: 1;
  top: 0;
  left: 0;
}

.dashboard_menu_area .dashboard_menu li a:hover {
  color: {{ $allsettings->site_button_color }} !important;
}

.dashboard-edit .product .prod_option .setting-icon {
  font-size: 20px;
  line-height: 45px;
  width: 45px;
  text-align: center;
  background: #000;
  color: #fff;
  display: inline-block;
  background: {{ $allsettings->site_button_color }} !important;
  -webkit-border-radius: 200px;
  border-radius: 200px;
  cursor: pointer;
}

.dashboard-edit .product .prod_option .options ul li a:hover {
  color: {{ $allsettings->site_button_color }} !important;
}

.product-purchase .price_love > span {
  background: rgba(22, 200, 178, 0.1);
  line-height: 32px;
  display: inline-block;
  padding: 0 15px;
  color: {{ $allsettings->site_button_color }} !important;
  margin-right: 10px;
  font-size: 15px;
  font-weight: 500;
  -webkit-border-radius: 100px;
          border-radius: 100px;
}

.product-purchase .price_love > span.flash {
  background:#F05050;
  line-height: 32px;
  display: inline-block;
  padding: 0 15px;
  color:#fff !important;
  margin-right: 10px;
  font-size: 15px;
  font-weight: 500;
  -webkit-border-radius: 100px;
          border-radius: 100px;
}

.product-purchase .sell p span {
  color: {{ $allsettings->site_button_color }} !important;
  font-size: 15px;
  margin-right: 4px;
}

.turn-page .turn-ul li:hover, .turn-page .turn-ul li:active {
  background: {{ $allsettings->site_button_color }} !important;
  color: #fff;
}

.turn-page .turn-ul li.on {
  background: {{ $allsettings->site_button_color }} !important;
  color: #fff;
}

.custom_checkbox label .shadow_checkbox:before, .custom_checkbox .form-group p.label .shadow_checkbox:before, .form-group .custom_checkbox p.label .shadow_checkbox:before {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  content: '\f00c';
  font-size: 12px;
  visibility: hidden;
  text-align: center;
  color: #fff;
  line-height: 18px;
  font-family: FontAwesome, sans-serif;
  background: {{ $allsettings->site_button_color }} !important;
  -webkit-border-radius: 2px;
  border-radius: 2px;
}
.sidebar_author .author-menu ul li a:hover, .sidebar_author .author-menu ul li a.active {
  
  color: {{ $allsettings->site_button_color }} !important;
}

.product .product__thumbnail:before {
  position: absolute;
  content: "";
  -webkit-transition: 0.3s ease;
  -o-transition: 0.3s ease;
  transition: 0.3s ease;
  height: 100%;
  opacity: 0;
  z-index: 2;
  -webkit-border-radius: 4px 4px 0 0;
          border-radius: 4px 4px 0 0;
  width: 100%;
  top: 0;
  
 
  background-color: {{ $allsettings->site_button_color }} !important;
  
  background: {{ $allsettings->site_button_color }} !important;
  
  left: 0;
}

.single_blog .blog__title:hover h4 {
  color: {{ $allsettings->site_button_color }} !important;
}

.sidebar--blog .sidebar--post .card-title ul li a.active {
  color: {{ $allsettings->site_button_color }} !important;
}

.product--sidebar .card--category ul li a:hover, .support--sidebar .card--category ul li a:hover, .faq--sidebar .card--category ul li a:hover, .affliate_rule_module .card--category ul li a:hover, .support--sidebar .card--forum_categories ul li a:hover, .faq--sidebar .card--forum_categories ul li a:hover, .affliate_rule_module .card--forum_categories ul li a:hover, .sidebar--blog .card--forum_categories ul li a:hover, .sidebar--blog .card--category ul li a:hover {
  color: {{ $allsettings->site_button_color }} !important;
}
.range-price
{
border:0; color:{{ $allsettings->site_button_color }} !important; font-weight:bold;
font-size:16px;
margin-bottom:14px;
}

.lato{}.jplist-panel .jplist-pagination{cursor:pointer;float:right;line-height:30px}
.jplist-panel .jplist-pagination button{list-style: none;
    float: left;
    width: 38px;
    height: 36px;
    line-height: 36px;
    text-align: center;
    border: 1px solid #54667a;
    margin-left: -1px;
    cursor: pointer;
    background: #fff;}
	.jplist-label { 
    height: 36px !important;
    line-height: 38px !important;
	border: 1px solid #54667a !important;
    margin-left: -1px;
    cursor: pointer !important;
    background: #fff !important;
	border-radius:0px !important;
	}
.jplist-panel button { border-radius:0px !important; box-shadow:0px !important; text-shadow:none !important; margin:10px 5px 0 0 !important; }	

.jplist-panel .jplist-pagination .jplist-current{color: #fff; background:{{ $allsettings->site_button_color }} !important;}
.jplist-panel .jplist-pagination .jplist-pagingprev,.jplist-panel .jplist-pagination .jplist-pagingmid,.jplist-panel .jplist-pagination .jplist-pagingnext{float:left}.jplist-panel .jplist-pagination .jplist-pagingprev button,.jplist-panel .jplist-pagination .jplist-pagingnext button{font-size:20px;}.jplist-one-page{display:none}.jplist-empty{display:none}

.custom-radio label span.circle:before, .custom-radio .form-group p.label span.circle:before, .form-group .custom-radio p.label span.circle:before {
  content: "";
  background: #fff;
  border: 4px solid {{ $allsettings->site_button_color }};
}
.custom-radio .freelance label span.circle:before
{
border:0px !important;
}
.jplist-selected
{
color:{{ $allsettings->site_button_color }} !important;
}
/*.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default
{
background:{{ $allsettings->site_button_color }} !important;
border:1px solid {{ $allsettings->site_button_color }} !important;
}
.ui-widget-header
{
background:{{ $allsettings->site_primary_color }} !important;
border:1px solid {{ $allsettings->site_primary_color }} !important;
}
*/
.product--card-small ul.titlebtm > li .sell span {
  color: {{ $allsettings->site_button_color }} !important;
}
.sidebar--single-product .sidebar-card.card--pricing2 .price, .sidebar--single-product .card--pricing2.item-preview .price {
  background: {{ $allsettings->site_button_color }} !important;
  -webkit-border-radius: 4px 4px 0 0;
          border-radius: 4px 4px 0 0;
}

.item-features ul li span.right
{
color:{{ $allsettings->site_button_color }} !important;
font-size:16px;
font-weight:bold;
top:2px;
position:relative;
}
.item-features ul li span.wrong
{
color:#FF0000 !important;
font-size:16px;
font-weight:bold;
top:2px;
position:relative;
}

.sidebar--blog .card--tags .tags li a,.item-tags {
  color: {{ $allsettings->site_button_color }} !important;
  background: rgba(117, 224, 211, 0.14);
  line-height: 30px;
  display: inline-block;
  padding: 0 15px;
  -webkit-border-radius: 200px;
          border-radius: 200px;
}
.item-tags
{
display: inline-block;
    margin-right: 10px;
	margin-bottom:10px;
}
.section-title h1 .highlighted {
  color: {{ $allsettings->site_button_color }} !important;
}
.product-desc .product_title:hover h4 {
  color: {{ $allsettings->site_button_color }} !important;
}

.single_product .product__price_download .item_price span {
  background: rgba(22, 200, 178, 0.1);
  line-height: 32px;
  display: inline-block;
  padding: 0 15px;
  color: {{ $allsettings->site_button_color }};
  margin-right: 10px;
  font-size: 15px;
  font-weight: 500;
  -webkit-border-radius: 100px;
          border-radius: 100px;
}

.single_product .product__price_download .item_action .remove_from_cart span {
  font-size: 18px;
  -webkit-transition: 0.2s;
  -o-transition: 0.2s;
  transition: 0.2s;
  line-height: 50px;
  width: 50px;
  text-align: center;
  background: rgba(22, 200, 178, 0.1);
  -webkit-border-radius: 50%;
          border-radius: 50%;
  display: inline-block;
  color: {{ $allsettings->site_button_color }} !important;
}
.remove_carrt
{
color:#FF0000;
font-weight:bold;
font-size: 18px;
}
.dropdowns.dropdown--cart .cart_area .cart_action .go_checkout {
  background: {{ $allsettings->site_primary_color }} !important;
}

.dropdowns.dropdown--cart .cart_area .cart_action .go_cart {
  background: {{ $allsettings->site_secondary_color }} !important;
}

.dropdowns.dropdown--cart .cart_area .cart_product .product__action a:hover span {
  color: #FF0000;
  
}

.dropdowns.dropdown--cart .cart_area .cart_product .product__action span {
  width: 30px;
  line-height: 30px;
  text-align: center;
  font-size: 15px;
  display: inline-block;
  color: #FF0000;
  
}
.product__action p
{
color: {{ $allsettings->site_button_color }} !important;
}

.author__notification_area ul li .notification_count.purch {
  background: {{ $allsettings->site_button_color }} !important;
}

.single_product .license p {
  color: {{ $allsettings->site_button_color }} !important;
}

.table.withdraw__table .pending > span {
  background: {{ $allsettings->site_button_color }} !important;
  color: #fff;
}

.table.withdraw__table .paid > span {
  background: rgba(22, 200, 178, 0.1);
  color: {{ $allsettings->site_button_color }} !important;
}

.sidebar_author .freelance-status .custom-radio label span.circle:before, .sidebar_author .freelance-status .custom-radio .form-group p.label span.circle:before, .form-group .sidebar_author .freelance-status .custom-radio p.label span.circle:before {
  background: {{ $allsettings->site_button_color }} !important;
  border: 0;
  content: "\f00c";
  font-family: FontAwesome , sans-serif;
}

ul.nav-tabs li a.active {
  border-bottom: 0;
  border: 0;
  background: none;
  color: {{ $allsettings->site_button_color }} !important;
}
ul.nav-tabs li a:before {
  content: "";
  position: absolute;
  height: 3px;
  width: 100%;
  background: {{ $allsettings->site_button_color }} !important;
  opacity: 0;
  left: 0;
  -webkit-transition: 0.3s ease;
  -o-transition: 0.3s ease;
  transition: 0.3s ease;
  visibility: hidden;
}

ul.nav-tabs li a:hover {
  border: none;
  background: none;
  color: {{ $allsettings->site_button_color }} !important;
}

.mini-footer p a:hover {
  color: {{ $allsettings->site_button_color }} !important;
}

.go_top {
  line-height: 40px;
  cursor: pointer;
  width: 40px;
  background: {{ $allsettings->site_button_color }} !important;
  color: #fff;
  position: fixed;
  -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
          box-shadow: 0 4px 4px rgba(0, 0, 0, 0.1);
  -webkit-border-radius: 50%;
          border-radius: 50%;
  right: 20px;
  z-index: 111;
  bottom: 20px;
}

.sorting ul li a:hover {
  color: #fff !important;
  background: {{ $allsettings->site_button_color }} !important;
}

a.jplist-selected
{
color: #fff !important;
  background: {{ $allsettings->site_button_color }} !important;
}

.sorting ul li a {
  font-size: 15px;
  -webkit-border-radius: 100px;
          border-radius: 100px;
  font-weight: 500;
  line-height: 34px;
  -webkit-transition: 0.3s ease;
  -o-transition: 0.3s ease;
  transition: 0.3s ease;
  padding: 0 21px;
  background: #fff;
  color: {{ $allsettings->site_button_color }};
  display: inline-block;
}
.videobtn
{
    font-size: 15px !important;
    font-weight: 500 !important;
    color: #fff !important;
}

.footer-big {
  background: {{ $allsettings->site_secondary_color }} !important;
}

.mini-footer {
  background: {{ $allsettings->site_primary_color }} !important;
  text-align: center;
  padding: 32px 0;
}
</style>
@if($translate == 'ar')
<style type="text/css">
.btn-ss
{
padding:0 10px;
}
.mover15
{
right:5px;
}
</style>
@endif