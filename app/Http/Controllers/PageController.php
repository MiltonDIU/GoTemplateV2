<?php

namespace Feberr\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;
use Feberr\Models\Pages;

class PageController extends Controller {

  public function view_profile_settings() {
    return view('theme2.profile-settings');
  }
	
	public function view_page($page_id, $page_slug) {
	  $page['page'] = Pages::editpageData($page_id);
	  $data = array('page' => $page);
	  return view('theme2.page', compact('data'));
	}
}
