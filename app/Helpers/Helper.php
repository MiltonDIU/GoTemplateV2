<?php

namespace Feberr\Helpers;
use Cookie;
use Feberr\Models\Category;
use Feberr\Models\ItemCheckout;
use Feberr\Models\SubCategory;
use Illuminate\Support\Facades\Crypt;
use Feberr\Models\Languages;
use Illuminate\Support\Facades\DB;

class Helper {

    public static function translation($id,$code) {

	    if($code == 'en') {
		   $tran_value['view'] = Languages::en_Translate($id,$code);
		} else {
		  $tran_value['view'] = Languages::other_Translate($id,$code);
		}

		return $tran_value['view']->keyword_text;
    }

    public static function orderCount(){
       return ItemCheckout::get()->count();
    }
    public static function paymentOrderCount(){
       return ItemCheckout::where('payment_status','completed')->where('vendor_amount','!=','0')->get()->count();
    }
    public static function pendingOrderCount(){
        return ItemCheckout::where('payment_status','pending')->where('vendor_amount','!=','0')->get()->count();

    }
    public static function freeOrderCount(){
        return ItemCheckout::where('vendor_amount','=','0')->get()->count();

    }

    public static function itemCount(){
        $value = DB::table('items')->join('users', 'users.id', 'items.user_id')->where('items.drop_status', '=', 'no')->orderBy('items.item_id', 'desc')->get();
        return count($value);
    }
    public static function itemApproveCount(){
        $value = DB::table('items')->where('items.item_status','1')->join('users', 'users.id', 'items.user_id')->where('items.drop_status', '=', 'no')->orderBy('items.item_id', 'desc')->get();
        return count($value);
    }
    public static function itemRejectCount(){
        $value = DB::table('items')->where('items.item_status','2')->join('users', 'users.id', 'items.user_id')->where('items.drop_status', '=', 'no')->orderBy('items.item_id', 'desc')->get();
        return count($value);
    }
    public static function itemPendingCount(){
        $value = DB::table('items')->where('items.item_status','0')->join('users', 'users.id', 'items.user_id')->where('items.drop_status', '=', 'no')->orderBy('items.item_id', 'desc')->get();
        return count($value);
    }
    public static function itemFreeCount(){
        $value = DB::table('items')->where('items.free_download','1')->join('users', 'users.id', 'items.user_id')->where('items.drop_status', '=', 'no')->orderBy('items.item_id', 'desc')->get();
        return count($value);
    }
    public static function itemFlashRequestCount(){
        $value = DB::table('items')->where('items.item_flash_request','1')->join('users', 'users.id', 'items.user_id')->where('items.drop_status', '=', 'no')->orderBy('items.item_id', 'desc')->get();
        return count($value);
    }

    public static function parrentCategory($id,$type){
        if ('subcategory'===$type){
            $subCategory = SubCategory::where('subcat_id',$id)->first();
           return $subCategory->cat_id;
        }else{
            $category = Category::where('cat_id',$id)->first();
            return $category->cat_id;
        }
    }

    public static function parrentCategoryName($id,$type){
        if ('subcategory'===$type){
            $subCategory = SubCategory::where('subcat_id',$id)->first();
            $category = Category::where('cat_id', $subCategory->cat_id)->first();
            return $category->category_name;
        }else{
            $category = Category::where('cat_id',$id)->first();
            return $category->category_name;
        }
    }
}
