<?php

namespace Feberr\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Category extends Model
{

	/* category */

	protected $table = 'category';


  public static function getsinglecatData($item_cat_id)
  {

    $value=DB::table('category')->where('cat_id','=',$item_cat_id)->first();
    return $value;

  }



  public static function getcategoryData()
  {

    $value=DB::table('category')->where('drop_status','=','no')->orderBy('cat_id', 'desc')->get();
    return $value;

  }

  public static function footercategoryData()
  {

    $value=DB::table('category')->where('drop_status','=','no')->where('category_status','=',1)->orderBy('cat_id', 'desc')->take(6)->get();
    return $value;

  }


  public static function insertcategoryData($data){

      DB::table('category')->insert($data);


    }

  public static function deleteCategorydata($cat_id,$data){


	DB::table('category')
      ->where('cat_id', $cat_id)
      ->update($data);

  }


  public static function editcategoryData($cat_id){
    $value = DB::table('category')
      ->where('cat_id', $cat_id)
      ->first();
	return $value;
  }


  public static function updatecategoryData($cat_id,$data){
    DB::table('category')
      ->where('cat_id', $cat_id)
      ->update($data);
  }




  /* category */



  /* subcategory */



  public static function getsubcategoryData()
  {

    $value=DB::table('subcategory')->leftJoin('category','category.cat_id','=','subcategory.cat_id')->where('subcategory.drop_status','=','no')->orderBy('subcategory.subcat_id', 'desc')->get();
    return $value;

  }


  public static function allcategoryData()
  {

    $value=DB::table('category')->where('drop_status','=','no')->where('category_status','=','1')->orderBy('cat_id', 'desc')->get();
    return $value;

  }


  public static function menucategoryData()
  {

    $value=DB::table('category')->where('drop_status','=','no')->where('category_status','=','1')->orderBy('cat_id', 'asc')->get();
    return $value;

  }


  /* menu */


    public function SubCategory()
    {
//        return $this->hasMany(SubCategory::class, 'cat_id', 'cat_id');//old
        return $this->hasMany(SubCategory::class, 'cat_id', 'cat_id')->where('drop_status','=','no')->where('parent_id',0);
    }

  /* menu */

  public static function insertsubcategoryData($data){

      DB::table('subcategory')->insert($data);


    }


    public static function deleteSubcategorydata($subcat_id,$data){


	DB::table('subcategory')
      ->where('subcat_id', $subcat_id)
      ->update($data);

  }



  public static function editsubcategoryData($subcat_id){
    $value = DB::table('subcategory')
      ->where('subcat_id', $subcat_id)
      ->first();
	return $value;
  }



  public static function updatesubcategoryData($subcat_id,$data){
    DB::table('subcategory')
      ->where('subcat_id', $subcat_id)
      ->update($data);
  }

  /* subcategory */


  /* homepage new product*/

  public static function homecategoryData($category_limit)
  {

    $value=DB::table('category')->where('drop_status','=','no')->where('category_status','=',1)->orderBy('cat_id', 'desc')->take($category_limit)->get();
    return $value;

  }


  /* homepage new product*/




}
